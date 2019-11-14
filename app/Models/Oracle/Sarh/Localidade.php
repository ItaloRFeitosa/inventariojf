<?php

namespace App\Models\Oracle\Sarh;

use Illuminate\Database\Eloquent\Model;

class Localidade extends Model
{
    protected $connection = 'oracle';
    protected $table = 'SARH.RH_LOTACAO';
    protected $primaryKey = 'LOTA_COD_LOTACAO';
    public $incrementing = false;
    public $timestamps = false;
  
    public static function allLocalidadesDisponiveisInventario(){

        //Seções Disponiveis para inventariar
        $codDisponiveis = [9,18,26,281,353];

        $localidades = Localidade::all();
        
        foreach ($localidades as $localidade)
        {
            $disponiveis = [
                $localidade->lota_cod_lotacao,
                $localidade->lota_sigla_lotacao,
                $localidade->lota_dsc_lotacao
            ];
        }

        return $localidades;
    }
}



