<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumo extends Model
{
    use HasFactory;

    /**
     * Campos que podem ser preenchidos em massa (mass assignment).
     */
    protected $fillable = [
        'obra_id',
        'item_id',
        'quantidade',
        'responsavel',
        'cpf_funcionario',
        'data_consumo',
    ];

    /**
     * Relacionamento: Consumo pertence a uma Obra.
     */
    public function obra()
    {
        return $this->belongsTo(Obra::class);
    }

    /**
     * Relacionamento: Consumo pertence a um Item.
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
