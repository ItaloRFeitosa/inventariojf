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
    public function create()
    {
        $localidades = Localidade::allLocalidadesDisponiveisInventario();
        return view('admin.inventarios.create', compact('localidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(
        InventarioFormRequest $request,
        CriadorDeInventario $criadorDeInventario)
    {
        $invenatario =  $criadorDeInventario->criarInvenatario(
            $request->name,
            $request->ano,
            $request->localidade,
            $request->portaria,
            $request->data_inicio,
            $request->duracao,
            $request->obs
        );

        $request->session()
            ->flash(
                
            );

        return redirect()->route('');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $inventario)
    {
        //dd($inventario);
        //$criado_por = ServPessoal::where('NU_MATR_SERVIDOR', $inventario->criado_por)->first()->no_servidor;
        $criado_por = $inventario->criado_por;
        $membros = $inventario->membros;
        //dd($criado_por);
        return view('admin.inventarios.show', compact('inventario','criado_por', 'membros'));
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
