<?php

namespace App\Models\Oracle\Sicam;

use Illuminate\Database\Eloquent\Model;

class Tombo extends Model
{
    protected $connection = 'oracle';
    protected $table = 'SICAM.TOMBO';
    protected $primaryKey = 'NU_TOMBO';
    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];

    public function material(){
        return $this->belongsTo(Material::class,'co_mat');
    }
}
