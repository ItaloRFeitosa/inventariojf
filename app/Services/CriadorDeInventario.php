<?php

namespace App\Services;

use App\Models\Inventario;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\String_;

class CriadorDeSerie
{
    public function criarInventario(
        String $name,
        int $ano,
        String $localidade,
        String $portaria,
        String $data_inicio,
        int $duracao,
        String $obs
    ):Inventario {
        
        $data_fim = dataFim($data_inicio,$duracao);

        DB::beginTransaction();
        
        $inventario = Inventario::create(
            [
                'name'  =>$name,
                'ano'   =>$ano,
                'localidade' =>$localidade,
                'portaria'   =>$portaria,
                'data_inicio'=>$data_inicio,
                'data_fim'   =>$data_fim,
                'criado_por' =>$criado_por,
                'obs'        =>$obs
            ]
        );

        DB::commit();

        return $inventario;
    }

    private function dataFim($data_inicio,$duracao){

        return FALSE;
    }

    
}
