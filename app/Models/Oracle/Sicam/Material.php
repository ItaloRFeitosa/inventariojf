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

    public function tombos(){
        $co_mat = $this->co_mat;
        return Tombo::where('co_mat', $co_mat)->where('ti_tombo', 'T');
    }
}
