<?php

namespace App\Models\Oracle\Sicam;

use App\Models\Oracle\Sarh\RhLotacao;
use App\Models\Oracle\Sarh\ServPessoal;
use Illuminate\Database\Eloquent\Model;

class Termo extends Model
{
    protected $connection = 'oracle';
    protected $table = 'SICAM.TERMO';
    protected $primaryKey = ['NU_TERMO','AN_TERMO'];
    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];


    // Retorna todos os tombos referentes ao termo
    public function tombos(){
        return Tombo::where('NU_TERMO', $this->nu_termo)->where('AN_TERMO',$this->an_termo)->paginate();
    }


    // Retorna model do servidor respnsavel pelo termo
    public function servidorResponsavel(){
        return ServPessoal::where('NU_MATR_SERVIDOR', $this->nu_matr_resp_tombo)->first();
    }


    // Retorna model da lotacao referente ao termo
    public function lotacao(){
        return RhLotacao::where('LOTA_COD_LOTACAO', $this->co_lota)->first();

    }

    // Retorna nome do setor referente ao termo e lotacao
    public function setor(){
        return PatrimonioSetor::where('CO_LOTA', $this->co_lota)->where('CO_SETOR', $this->co_setor)->first();
    }
}
