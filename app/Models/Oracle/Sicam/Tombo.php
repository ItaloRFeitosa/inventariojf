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
    

    // Retorna descrição do material dado o código do material
    public function descricaoMaterial(){
        return Material::select('DE_MAT')->where('CO_MAT', $this->co_mat)->first()->de_mat;
    }


    // Retorna model Termo referente ao tombo
    public function termo(){

        return Termo::where([['NU_TERMO', $this->nu_termo],['AN_TERMO',$this->an_termo]])->first();
    }


}
