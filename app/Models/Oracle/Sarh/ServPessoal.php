<?php

namespace App\Models\Oracle\Sarh;

use Illuminate\Database\Eloquent\Model;
use App\Models\Oracle\Sicam\Termo;        


class ServPessoal extends Model
{
    protected $connection = 'oracle';
    protected $table = 'SARH.SERV_PESSOAL';
    protected $primaryKey = 'NU_MATR_SERVIDOR';
    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];


    public function lotacao(){
        return ServLotacao::where('NU_MATR_SERVIDOR', $this->nu_matr_servidor)->where('DT_SAIDA', null)->first()->lotacao();
    }

    public function termos(){
        return Termo::where('NU_MATR_RESP_TOMBO', $this->nu_matr_servidor)->paginate();
    }


}
