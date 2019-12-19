<?php

namespace App\Models\Oracle\Sicam;

use App\Models\Coleta;
use App\Models\Oracle\Sarh\RhLotacao;
use App\Models\Oracle\Sarh\RhLotaTraducao;
use Illuminate\Database\Eloquent\Model;

class PatrimonioSetor extends Model
{
    protected $connection = 'oracle';
    protected $table = 'SICAM.PATRIMONIO_SETOR';
    protected $primaryKey = ['CO_LOTA','CO_SETOR'];
    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];

    // Retorna termos referente a lotacao e setor
    public function termos(){
        return Termo::where('CO_LOTA', $this->co_lota)->where('CO_SETOR', $this->co_setor)->get();
    }

    public function tombos($perPage = 10){
        
        $tombos = Tombo::join('termo', function($join){
                                $join->on('TOMBO.AN_TERMO', 'TERMO.AN_TERMO')
                                ->on('TOMBO.NU_TERMO', 'TERMO.NU_TERMO');
                            })
                                ->select('tombo.*')
                                ->where('TERMO.CO_LOTA', $this->co_lota)
                                ->where('TERMO.CO_SETOR', $this->co_setor)
                                ->where('TI_TOMBO', '=', 'T')
                                ->orderBy('TOMBO.NU_TOMBO')
                                ->paginate($perPage);

        return $tombos;
    }

    // Retorna model RhLotacao referente ao setor
    public function lotacao(){
        //return RhLotaTraducao::where('LOTA_COD_LOTACAO', $this->co_lota)->first();

    }

    public function coletas($id_membro){
        return Coleta::where('id_membro', $id_membro)->where('cod_lotacao', $this->cod_lotacao)->where('cod_setor', $this->cod_setor)->get();
    }
}
