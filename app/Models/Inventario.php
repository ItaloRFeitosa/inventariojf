<?php

namespace App\Models;

use App\Models\Oracle\Sarh\ServPessoal;
use App\Models\Oracle\Sarh\RhLotacao;
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

    public function duracaoInventario(){

        $duracao = $this->data_inicio->diffInDays($this->data_fim);
        return $duracao;
    }

    public function tempoFinalizacao(){

        return Carbon::now()->diffInDays($this->data_fim);
    }

    public function membros(){
        return $this->hasMany(Membro::class, 'id_inventario');
    }

    public function criado_por_nome(){
        return ServPessoal::where('NU_MATR_SERVIDOR', $this->criado_por)->first()->no_servidor;
    }

    public function lotacao(){
        return RhLotacao::where('LOTA_COD_LOTACAO', $this->localidade)->first();

    }
}