<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    //
    protected $fillable = [
            'name',
            'ano',
            'localidade',
            'portaria',
            'data_inicio',
            'data_fim',
            'criado_por',
            'obs',
            'ativo'
    ];

    protected $dates = [
        'data_inicio',
        'data_fim'
    ];

}