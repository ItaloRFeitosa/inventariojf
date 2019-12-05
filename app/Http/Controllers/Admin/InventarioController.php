<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Inventario\InventarioFormRequest;
use App\Http\Requests\Admin\Inventario\UpdateInventarioFormRequest;
use App\Http\Controllers\Admin\MembroController;
use App\Models\Inventario;
use App\Models\Oracle\Sarh\ServPessoal;
use App\Models\Oracle\Sarh\Localidade;
use Exception;
use Illuminate\Foundation\Testing\HttpException;
use Illuminate\Http\Request;
use App\Services\CriadorDeInventario;
use App\Services\CriadorDeMembro;
use Throwable;


class InventarioController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventarios = Inventario::all();
        $inventariosAtivos = $inventarios->where('ativo', 1);
        $inventariosFinalizados = $inventarios->where('ativo', 0);
        return view('admin.inventarios.index', compact('inventariosAtivos','inventariosFinalizados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CriadorDeInventario $criadorDeInventario)
    {
        $localidades = Localidade::localidades();
        $servidores = ServPessoal::ativos()->get();
        $valoresPadrao = $criadorDeInventario->valoresPadrao($localidades);
        return view('admin.inventarios.create', compact('localidades','servidores','valoresPadrao'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(
        InventarioFormRequest $request,
        CriadorDeInventario $criadorDeInventario,
        CriadorDeMembro $criadorDeMembro)
    {
        $criado_por = 'MA375VO';
        $flag_adm = '1';

        $inventario =  $criadorDeInventario->criarInventario(
            $request->name,
            $request->ano,
            $request->localidade,
            $request->portaria,
            $request->data_inicio,
            $request->duracao,
            $criado_por,
            $request->obs
        );

        $criadorDeMembro->criarMembro(
            $inventario,
            $request->nu_matr_servidor,
            $flag_adm
        );


        $request->session()
            ->flash('status',"O inventario {$inventario->name} do ano de {$inventario->ano} foi criado com sucesso");
        
        return redirect()->route('inventarios.show', $inventario);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $inventario)
    { 
        $membros = $inventario->membros;
        
        return view('admin.inventarios.show', compact('inventario', 'membros'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventarioFormRequest $request, Inventario $inventario)
    {
        try {
            $dataForm = $request->all();
            $duracao = $inventario->duracaoInventario()+$request->duracao;
            if ($inventario->update($dataForm)) {
                $inventario->data_fim = $inventario->data_inicio->addDays($duracao);
                $inventario->save();
                return redirect()->back()->with('status', 'Inventário Atualizado com Sucesso');
            }
        } catch (Throwable $th) {
                return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario)
    {
           
        try {
            if($inventario->delete()) {
                return redirect()->route('inventarios.index')->with('status', 'Inventário Excluído com Sucesso!');
            } else {
                return redirect()->route('inventarios.index')->with('warning', 'Exclusão Falhou!');
            }
        } catch(ModelNotFoundException $e) {
            return redirect()->route('inventarios.index')
                                ->withErrors('O Inventário pode te sido apagado durante esta operação de exclusão!')->withInput();
        } catch(Throwable $e) {
            if($e->getCode() == 23000 ){

                return redirect()->back()->with('warning', 'Exclusão não permitida, inventário possui membros e coletas!');
            } else {
                return redirect()->route('inventarios.index')->with('warning', 'Erro desconhecido: ' + $e->getMessage());
            }
        }
    }

    public function reativar($id){
        
        $inventario = Inventario::findOrFail($id);
        if ($inventario->reativar()) {
            return redirect()->route('inventarios.index')
            ->with('status', 'O Inventário foi reativado com sucesso!');
        } else {
            return redirect()->route('inventarios.show', compact('inventario'))
            ->with('warning', 'Reativação Falhou!');
        }
        
    }
    public function finalizar($id){
        
        $inventario = Inventario::findOrFail($id);
        if ($inventario->finalizar()) {
            return redirect()->route('inventarios.index')
            ->with('status', 'O Inventário foi finalizado com sucesso!');
        } else {
            return redirect()->route('inventarios.show', compact('inventario'))
            ->with('warning', 'Finalização Falhou!');
        }
    }
}