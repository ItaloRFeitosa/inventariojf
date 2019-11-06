<?php

namespace App\Models\Oracle\Sicam;

use App\Models\Oracle\Sarh\RhLotacao;
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
        return Termo::where('CO_LOTA', $this->co_lota)->where('CO_SETOR', $this->co_setor);
    }

    // Retorna model RhLotacao referente ao setor
    public function lotacao(){
        return RhLotacao::where('LOTA_COD_LOTACAO', $this->co_lota)->first();

    }
}
