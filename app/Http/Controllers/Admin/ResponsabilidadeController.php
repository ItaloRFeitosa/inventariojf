<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Responsabilidade;
use App\Models\Oracle\Sarh\RhLotacao;

class ResponsabilidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lotacoes = RhLotacao::paisEFilhas();
        return view('admin.membros.inventarioMembrosEdit', compact('lotacoes'));
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
        $lotacoes = $dataform['responsabilidades'];
       
        foreach($lotacoes as $lota_cod){
            $responsabilidade = new Responsabilidade;
            $responsabilidade->cod_lotacao = $lota_cod;
            $responsabilidade->cod_setor = 'sem setor';//por enquanto
            $responsabilidade->id_membro = $dataform['id_membro'];
            $responsabilidade->save();
        }

        $request->session()
            ->flash('status',"Responsabilidade foi adicionada com sucesso com sucesso");
    
        return redirect()->route('inventario.membro.edit', [$responsabilidade->membro->inventario, $responsabilidade->membro] );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy(Responsabilidade $responsabilidade)
    {
        if($responsabilidade->delete()) {
            return redirect()->route('inventario.membro.edit', [$responsabilidade->membro->inventario, $responsabilidade->membro])->with('status', 'Responsabilidade excluída com Sucesso!');
        } else {
            return redirect()->route('inventario.membro.edit', [$responsabilidade->membro->inventario, $responsabilidade->membro])->with('warning', 'Exclusão Falhou!');
        }
    }
}
