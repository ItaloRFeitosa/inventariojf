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

    public function duracaoInventario(){ //quantidade de dias totais do processo de invemtario

        return $this->data_inicio->diffInDays($this->data_fim);
    }

    public function tempoFinalizacao(){ //quantidade de dias para finalização do invemtario
        
        if($this->isColetaAtiva()){
            return Carbon::now()->diffInDays($this->data_fim); //para finalizar
        }
        elseif($this->isPosColeta()){ //ja terminado
            return 0;
        }else
            return NULL;
        
    }

    public function progresso(){ //progresso em porcentagem
        
        if($this->isColetaAtiva()){
            return ( ( ($this->duracaoInventario() - $this->tempoFinalizacao() ) 
            / $this->duracaoInventario() ) *100 );
        }
        elseif($this->isPreColeta()){
            return 0;
        }
        elseif($this->isPosColeta()){
            return 100;
        }
        
    }

    public function isPosColeta(){ //já foi utrapassado o periodo
        return ( $this->isAtivo() && Carbon::now() > $this->data_fim ) ? TRUE : FALSE;
    }

    public function  isPreColeta(){ //o periodo ainda não foi iniciado
        return ( $this->isAtivo() && Carbon::now() < $this->data_inicio ) ? TRUE : FALSE;
    }

    public function isColetaAtiva(){ //esta dentro do periodo estipulado?
        return ( $this->isAtivo() && !$this->isPosColeta() && !$this->isPreColeta() ) ? TRUE : FALSE; 
    }

    public function isAtivo(){ //o inventario esta ativo?
        return $this->ativo;
    }

    public function finalizar(){ //finalizar o inventario
        if( $this->isPosColeta() ){
            return Inventario::update( ['ativo' => FALSE] );
        }
    }

    public function reativar(){ //reativa o inventario
        return Inventario::update( ['ativo' => TRUE] );
    }

    public function membros(){
        return $this->hasMany(Membro::class, 'id_inventario');
    }

    public function criado_por_nome(){ //nome de quem criou
        return ServPessoal::where('NU_MATR_SERVIDOR', $this->criado_por)->first()->no_servidor;
    }

    public function localidade(){ //descrição da localidade
        return RhLotacao::where('LOTA_COD_LOTACAO', $this->localidade)->first();

    }
}