<?php

namespace App\Models\Oracle\Sarh;

use Illuminate\Database\Eloquent\Model;

class ServLotacao extends Model
{
    protected $connection = 'oracle';
    protected $table = 'SARH.SERV_LOTACAO';
    protected $primaryKey = 'NU_MATR_SERVIDOR';
    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];

    public function servidor(){
        return ServPessoal::where('NU_MATR_SERVIDOR', $this->nu_matr_servidor)->first();
    }

    public function lotacao(){
        return RhLotacao::where('LOTA_COD_LOTACAO', $this->co_lotacao)->first();

    }
}
