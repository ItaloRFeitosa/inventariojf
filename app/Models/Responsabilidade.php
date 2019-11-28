<?php

namespace App\Models;

use App\Models\Oracle\Sarh\RhLotacao;
use Illuminate\Database\Eloquent\Model;

class Responsabilidade extends Model
{
    protected $fillable = [
        'id_membro',
        'cod_lotacao',
        'cod_setor'
        
    ];

    public function membro() {
        return $this->belongsTo(Membro::class, 'id_membro');
    }

    public function lotacao() {
        return RhLotacao::where('LOTA_COD_LOTACAO', $this->cod_lotacao)->first();
    }
}
