<?php

namespace App\Models\Oracle\Sarh;

use App\Models\Oracle\Sicam\PatrimonioSetor;        
use App\Models\Oracle\Sicam\Termo;        
use App\Models\Oracle\Sicam\Tombo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class RhLotacao extends Model
{
    protected $connection = 'oracle';
    protected $table = 'SARH.RH_LOTACAO';
    protected $primaryKey = 'LOTA_COD_LOTACAO';
    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];

    public function tombos(){
        $lotacoes = RhLotaTraducao::where('LOTR_LOTA_COD_LOTACAO', $this->lota_cod_lotacao)->get()->map(function($lotacao){
            return $lotacao->lotr_co_antigo_lotacao;
        });
      
       

        
        $tombos = Tombo::join('termo', function($join){
                                $join->on('TOMBO.AN_TERMO', 'TERMO.AN_TERMO')
                                ->on('TOMBO.NU_TERMO', 'TERMO.NU_TERMO');
                            })
                                ->select('tombo.*')
                                ->whereIn('TERMO.CO_LOTA', $lotacoes)
                                ->where('TI_TOMBO', '=', 'T')
                                ->get();

        return $tombos;
    }

    public function setores(){
        $lotacoes = RhLotaTraducao::where('LOTR_LOTA_COD_LOTACAO', $this->lota_cod_lotacao)->get();
        $setores = [];
        foreach($lotacoes as $lotacao){
            foreach($lotacao->setores() as $setor){
                if(!empty($setor)){
                    array_push($setores,$setor);
                }
            }
        }
        $setores = collect($setores);
        // $setores = $setores->->mapSpread(function($setor){
        //     return $setor;
        // });
        //dd($setores[0]);
        return $setores;
    }
    public function hasTombos(){

        try {
            $lotacoes = RhLotaTraducao::where('LOTR_LOTA_COD_LOTACAO', $this->lota_cod_lotacao)->get()->map(function($lotacao){
                return $lotacao->lotr_co_antigo_lotacao;
            });
            
            $tombos = Termo::join('TOMBO', function($join){
                                    $join->on('TOMBO.AN_TERMO', 'TERMO.AN_TERMO')
                                    ->on('TOMBO.NU_TERMO', 'TERMO.NU_TERMO')
                                    ->where('TI_TOMBO', '=', 'T');
                                })
                                    ->whereIn('TERMO.CO_LOTA', $lotacoes)
                                    ->firstOrFail();
            
            return true;
        } catch (\Throwable $th) {
            return false;
        }

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
        $lotacoes = static::all();
        $lotacoes = $lotacoes->mapToGroups(function($lotacao, $key){
            //dd($lotacao->lotacaoPai()['lota_sigla_lotacao']);
            if($lotacao->hasTombos()){
                $pai = $lotacao->lotacaoPai();
                return [($pai['lota_cod_lotacao'].' - '.$pai->hierarquia(2).' - '.$pai['lota_dsc_lotacao']) => $lotacao];
            }
            else{
                return ['semtombos' => $lotacao];
            }
        })->reject(function ($value, $key){
            return $key == 'semtombos';
        });
        //dd($lotacoes);
        return $lotacoes;
    }

    public function hierarquia($nivel = 3){

        if(($nivel == 0) || (empty($this->lotacaoPai()))){
            return $this->lota_sigla_lotacao;
        }
        return $this->lotacaoPai()->hierarquia(($nivel-1)).'/'.$this->lota_sigla_lotacao;
        
    }

}


