<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estoque extends Model
{
    use HasFactory;

    protected $table = 'estoques';
    protected $fillable = ['obra_id', 'item_id', 'quantidade', 'saldo_minimo'];

    public function obra()
    {
        return $this->belongsTo(Obra::class);
    }

    public function item() {
        return $this->belongsTo(\App\Models\Item::class);
    }
    

}
