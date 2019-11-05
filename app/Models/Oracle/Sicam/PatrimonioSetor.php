<?php

namespace App\Models\Oracle\Sicam;

use Illuminate\Database\Eloquent\Model;

class PatrimonioSetor extends Model
{
    protected $connection = 'oracle';
    protected $table = 'SICAM.PATRIMONIO_SETOR';
    protected $primaryKey = ['COD_LOTA','CO_SETOR'];
    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];
}
