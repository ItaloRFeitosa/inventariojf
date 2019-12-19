<?php

namespace App\Models\Oracle\Sarh;

use App\Models\Oracle\Sicam\PatrimonioSetor;        
use App\Models\Oracle\Sicam\Termo;        
use Illuminate\Database\Eloquent\Model;

class RhLotaTraducao extends Model
{
    protected $connection = 'oracle';
    protected $table = 'SARH.RH_LOTA_TRADUCAO';
    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];

    public function lotacao(){
        return Rhlotacao::where('LOTA_COD_LOTACAO', $this->lotr_lota_cod_lotacao)->first();
    }

    public function termos($ano){
        return Termo::where('AN_TERMO', $ano)->where('CO_LOTA', $this->lotr_co_antigo_lotacao)->get();
    }

    public function setores(){
        return PatrimonioSetor::where('co_lota', $this->lotr_co_antigo_lotacao)->get();
    }
}


