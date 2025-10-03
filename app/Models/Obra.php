<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'responsavel',
        'localizacao',
        'data_inicio',
        'data_fim',
    ];

    // Relacionamentos
    public function consumos()
    {
        return $this->hasMany(Consumo::class);
    }

    public function estoques()
    {
        return $this->hasMany(Estoque::class);
    }

    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }
}
