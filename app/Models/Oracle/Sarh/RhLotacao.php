<?php

namespace App\Models\Oracle\Sarh;

use App\Models\Oracle\Sicam\PatrimonioSetor;        
use App\Models\Oracle\Sicam\Termo;        
use Illuminate\Database\Eloquent\Model;

class RhLotacao extends Model
{
    protected $connection = 'oracle';
    protected $table = 'SARH.RH_LOTACAO';
    protected $primaryKey = 'LOTA_COD_LOTACAO';
    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];

    public function termos(){
        return Termo::where('CO_LOTA', $this->lota_cod_lotacao);
    }


    public function setores(){
        return PatrimonioSetor::where('CO_LOTA', $this->lota_cod_lotacao)->get();
    }

    public function lotacaoPai(){
        return RhLotacao::where('LOTA_COD_LOTACAO', $this->lota_lota_cod_lotacao_pai)->first();
    }

    public function lotacoesFilha(){
        return RhLotacao::where('LOTA_LOTA_COD_LOTACAO_PAI', $this->lota_cod_lotacao);
    }

    public function servidoresLotacao(){
        return ServLotacao::where('CO_LOTACAO', $this->lota_cod_lotacao)->where('DT_SAIDA', null)->get();
    }

    public static function paisEFilhas(){
        $lotacoes = RhLotacao::where('LOTA_DAT_FIM', NULL)->get();
        $lotacoes = $lotacoes->mapToGroups(function($lotacao, $key){
            //dd($lotacao->lotacaoPai()['lota_sigla_lotacao']);
            $pai = $lotacao->lotacaoPai();
            return [($pai['lota_cod_lotacao'].' - '.$pai['lota_sigla_lotacao'].' - '.$pai['lota_dsc_lotacao']) => $lotacao];
            
        });
        return $lotacoes;
    }
}
