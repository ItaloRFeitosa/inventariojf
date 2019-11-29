<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inventario;
use App\Models\Membro;
use App\Models\Oracle\Sarh\ServPessoal;
use App\Models\Oracle\Sarh\RhLotacao;
use App\Models\Responsabilidade;
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
        $lotacoes = RhLotacao::paisEFilhas();
        
        //dd($lotacoes);
        return view('admin.membros.inventarioMembrosIndex', compact('servidores','inventario', 'lotacoes'));
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
        $membro = Membro::create($dataform);
        if ($membro) {
            if(!empty($dataform['responsabilidades'])){
                
                foreach($dataform['responsabilidades'] as $lota_cod){
                    $responsabilidade = new Responsabilidade;
                    $responsabilidade->id_membro = $membro->id;
                    $responsabilidade->cod_lotacao = $lota_cod;
                    $responsabilidade->cod_setor = 'sem setor';//por enquanto
                    $responsabilidade->save();
                }
                
            }
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
        return view('admin.membros.inventarioMembroShow', compact('inventario','membro'));
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

    public function inventarioMembroEdit(Inventario $inventario, Membro $membro)
    {
        $lotacoes = RhLotacao::paisEFilhas();
        
        //dd($membro);
        return view('admin.membros.inventarioMembroEdit', compact('inventario', 'lotacoes', 'membro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membro $membro)
    {
        $dataform = $request->all();
        $responsabilidades = $membro->responsabilidades;
        if(!empty($responsabilidades)){

            foreach($responsabilidades as $responsabilidade){
                $responsabilidade->cod_lotacao = 0;
                $responsabilidade->cod_setor = 0;//por enquanto
                $responsabilidade->delete();
            }
        }
        if(!empty($dataform['responsabilidades'])){   
                foreach($dataform['responsabilidades'] as $lota_cod){
                    $responsabilidade = new Responsabilidade;
                    $responsabilidade->id_membro = $membro->id;
                    $responsabilidade->cod_lotacao = $lota_cod;
                    $responsabilidade->cod_setor = 'sem setor';//por enquanto
                    $responsabilidade->save();
                }
        }

        if($membro->update($dataform)){

            return redirect()->route('inventario.membros.index', $membro->inventario)->with('status', 'Membro Atualizado com Sucesso');
        }
        
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membro $membro)
    {
        try {
            $inventario = $membro->inventario;
            if($inventario->isPreColeta()){
                $responsabilidades = $membro->responsabilidades;
                if(!empty($responsabilidades)){

                    foreach($responsabilidades as $responsabilidade){
                        $responsabilidade->cod_lotacao = 0;
                        $responsabilidade->cod_setor = 'nda';
                        $responsabilidade->delete();
                    }
                }
                if($membro->delete()) {
                    return redirect()->route('inventario.membros.index', $inventario)->with('status', 'Membro Excluído com Sucesso!');
                } else {
                    return redirect()->route('inventario.membros.index', $inventario)->with('warning', 'Exclusão Falhou!');
                }
            } else {
                return redirect()->route('inventario.membros.index', $inventario)->with('warning', 'Exclusão Falhou! - Inventário já foi iniciado!');
            }
        } catch(ModelNotFoundException $e) {
            return redirect()->route('inventario.membros.index', $inventario)
                                ->withErrors('O Membro pode te sido apagado durante esta operação de exclusão!')->withInput();
        } catch(Throwable $e) {
            if($e->getCode() == 23000 ){

                return redirect()->back()->with('warning', 'Exclusão não permitida, Membro possui membros e coletas!');
            } else {
                return redirect()->route('inventario.membros.index', $inventario)->with('warning', 'Erro desconhecido: ' + $e->getMessage());
            }
        }
    }
}
