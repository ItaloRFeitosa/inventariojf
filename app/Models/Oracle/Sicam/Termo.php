<?php

namespace App\Models\Oracle\Sicam;

use Illuminate\Database\Eloquent\Model;

class Termo extends Model
{
    protected $connection = 'oracle';
    protected $table = 'SICAM.TERMO';
    protected $primaryKey = ['NU_TERMO','AN_TERMO'];
    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];

    public function tombos(){
        return $this->hasMany(Tombo::class,'co_mat');
    }
}
