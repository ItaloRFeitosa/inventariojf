<?php

namespace App\Models;

use App\Models\Oracle\Sarh\ServPessoal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

class Membro extends Model
{
    protected $fillable = [
        'id_inventario',
        'nu_matr_servidor',
        'flag_adm'
        
    ];

    public function inventario() {
        return $this->belongsTo(Inventario::class, 'id_inventario');
    }

    public function responsabilidades() {
        return $this->hasMany(Responsabilidade::class, 'id_membro');
    }

    public function coletas(){
        return $this->hasMany(Coleta::class, 'id_membro');
    }

    public function servPessoal(){
        try {
            return ServPessoal::where('NU_MATR_SERVIDOR', $this->nu_matr_servidor)
            ->where('FLAG_ATIVO', TRUE)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            // Retorna null para evitar erros
            return null; 
        }
    }

    public function tornaAdm(){
        return Membro::update( ['flag_adm' => '1'] );
    }

    public function retirarAdm(){
        return Membro::update( ['flag_adm' => '0'] );
    }

    public function insertResponsabilidades($lotacoes){
        try {
            foreach($lotacoes as $lota_cod){
                $responsabilidade = new Responsabilidade;
                $responsabilidade->cod_lotacao = $lota_cod;
                $responsabilidade->cod_setor = 'sem setor';//por enquanto
                $responsabilidade->membro()->associate($this);
                $responsabilidade->save();
            }
        } catch (\Throwable $th) {
        }
        

    }

    public function updateResponsabilidades($lotacoes){
        try {
            $responsabilidades = $this->responsabilidades;
            if(!empty($responsabilidades)){

                foreach($responsabilidades as $responsabilidade){
                    $responsabilidade->membro()->dissociate();
                    $responsabilidade->delete();
                }
            } 
            if(!empty($lotacoes)){
                $this->insertResponsabilidades($lotacoes);
            }

        } catch (Throwable $th) {
        }

        
    }
}
