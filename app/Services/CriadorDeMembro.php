<?php

namespace App\Services;

use App\Models\Membro;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\String_;

class CriadorDeMembro
{
    public function criarMembro(
        Inventario $inventario,
        String $nu_matr_servidor,
        $flag_adm
        ){

        DB::beginTransaction();
        
        $membro = Membro::create(
            [
                'id_inventario' => $inventario->id,
                'nu_matr_servidor' => $nu_matr_servidor,
                'flag_adm' => $flag_adm   
            ]
        );

        DB::commit();

        return $membro;
    }

}
