<?php

namespace App\Models;

use App\Models\Oracle\Sarh\RhLotaTraducao;
use App\Models\Oracle\Sicam\PatrimonioSetor;
use App\Models\Oracle\Sicam\Tombo;
use Illuminate\Database\Eloquent\Model;

class Coleta extends Model
{
    protected $fillable = [
        'id_membro',
        'nu_tombo',
        'cod_lotacao', 
        'cod_setor',
        'obs',
        'estado_fisico',
        'flag_inconsistencia'
    ];

    protected $dates = [

    ];


    public function membro(){
        return $this->belongsTo(Membro::class, 'id_membro');
    }

    public function tombo(){
        return Tombo::where('NU_TOMBO', $this->nu_tombo)->where('TI_TOMBO', '=', 'T')->first();
    }

    public function lotacao(){
        Return RhLotaTraducao::where('lotr_co_antigo_lotacao', $this->cod_lotacao)->first()->lotacao();
    }

    public function setor(){
        return PatrimonioSetor::where('co_lota', $this->cod_lotacao)->where('co_setor', $this->cod_setor)->first();
    }
}
