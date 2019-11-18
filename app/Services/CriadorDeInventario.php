<?php

namespace App\Services;

use App\Models\Inventario;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\String_;

class CriadorDeInventario
{
    public function criarInventario(
        String $name,
        int $ano,
        String $localidade,
        String $portaria,
        String $data_inicio,
        int $duracao,
        String $criado_por,
        String $obs
    ):Inventario {
        
        $data_fim = CriadorDeInventario::dataFim($data_inicio, $duracao);


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

    protected function dataFim($data_inicio, $duracao){

        $carbon_inicio = new Carbon();

        $carbon_inicio = Carbon::parse($data_inicio);
        $carbon_fim = $carbon_inicio->addDays($duracao);

        $data_fim = $carbon_fim->toDateString();

        return $data_fim;
    }

    
}
