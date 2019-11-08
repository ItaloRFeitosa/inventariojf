<?php

namespace App\Models\Oracle\Sarh;

use Illuminate\Database\Eloquent\Model;

class Localidade extends Model
{
    protected $connection = 'oracle';
    protected $table = 'SARH.RH_LOTACAO';
    protected $primaryKey = 'LOTA_COD_LOTACAO';
    public $incrementing = false;
    public $timestamps = false;

    
}
