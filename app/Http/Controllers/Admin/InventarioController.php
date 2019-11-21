<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Inventario\InventarioFormRequest;
use App\Models\Inventario;
use App\Models\Oracle\Sarh\ServPessoal;
use App\Models\Oracle\Sarh\Localidade;
use Exception;
use Illuminate\Foundation\Testing\HttpException;
use Illuminate\Http\Request;
use App\Services\CriadorDeInventario;
use App\Http\Requests\InventariosFormRequest;
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
        $valoresPadrao = $criadorDeInventario->valoresPadrao($localidades);
        return view('admin.inventarios.create', compact('localidades','valoresPadrao'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(
        InventariosFormRequest $request,
        CriadorDeInventario $criadorDeInventario)
    {

        $criado_por = 'ma375vo';

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

        $request->session()
            ->flash(
                'status',
                "O inventario {$inventario->name} do ano de {$inventario->ano} foi criado com sucesso",
            );
        

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
        $localidade = Localidade::find($inventario->localidade);
        $duracao = Inventario::duracaoInventario($inventario); 
        $criado_por = ServPessoal::find( strtoupper($inventario->criado_por) );
        
        $membros = $inventario->membros;

        return view('admin.inventarios.show', compact('inventario', 'localidade', 'duracao', 'criado_por', 'membros'));
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
    public function update(InventarioFormRequest $request, Inventario $inventario)
    {
        try {
            $dataForm = $request->all();

            if ($inventario->update($dataForm)) {
                return redirect()->back()->with('status', 'Inventário Atualizado com Sucesso');
            }
        } catch (Throwable $th) {
                return redirect()->back()->withErrors('Algo de errado aconteceu!')->withInput();
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
            return redirect()->route('inventarios.index')->with('warning', 'Exclusão Falhou!');
        }
    }
}
