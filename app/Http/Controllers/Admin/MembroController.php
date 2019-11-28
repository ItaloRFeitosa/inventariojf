<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inventario;
use App\Models\Membro;
use App\Models\Oracle\Sarh\ServPessoal;
use App\Models\Oracle\Sarh\RhLotacao;
use App\Services\CriadorDeMembro;

class MembroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function inventarioMembrosIndex(Inventario $inventario)
    {
        $servidores = ServPessoal::ativos()->get();
        $lotacoes = RhLotacao::all();
        return view('admin.membros.inventarioMembroIndex', compact('servidores','inventario', 'lotacoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataform = $request->all();
        if (Membro::create($dataform)) {
            return redirect()->back()->with('status', 'Membro Adicionado com Sucesso');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inventarioMembrosShow(Inventario $inventario, Membro $membro)
    {   
        $responsabilidades = RhLotacao::where('LOTA_LOTA_COD_LOTACAO_PAI',$inventario->localidade)->paginate(10);
        return view('admin.membros.inventarioMembroShow', compact('inventario','membro','responsabilidades'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
