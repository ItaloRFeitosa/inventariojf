<?php

namespace App\Models\Oracle\Sicam;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $connection = 'oracle';
    protected $table = 'SICAM.MATERIAL';
    protected $primaryKey = 'CO_MAT';
    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];
}
