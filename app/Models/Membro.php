<?php

namespace App\Models;

use App\Models\Oracle\Sarh\ServPessoal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

    public function servPessoal(){
        try {
            return ServPessoal::where('NU_MATR_SERVIDOR', $this->nu_matr_servidor)
            ->where('FLAG_ATIVO', TRUE)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            // Retorna null para evitar erros
            return null; 
        }
    }
}
