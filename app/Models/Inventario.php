<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public static function duracaoInventario(Inventario $inventario){

        $data_inicio = $inventario->data_inicio;
        $data_fim = $inventario->data_fim;

        $carbon_inicio = Carbon::parse($data_inicio);
        $carbon_fim = Carbon::parse($data_fim);;

        $duracao = $carbon_inicio->diffInDays($carbon_fim);

        return $duracao;
    }

    public function membros(){
        return $this->hasMany(Membro::class, 'id_inventario');
    }

}