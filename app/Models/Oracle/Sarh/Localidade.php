<?php

namespace App\Models\Oracle\Sarh;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Localidade extends Model
{
    protected $connection = 'oracle';
    protected $table = 'SARH.RH_LOTACAO';
    protected $primaryKey = 'LOTA_COD_LOTACAO';
    public $incrementing = false;
    public $timestamps = false;
  
    public static function localidades(){
        
        $codDisponiveis = [9,18,26,281,353];
        $localidades = Localidade::find($codDisponiveis);

        return $localidades;
    }
    

    
}



