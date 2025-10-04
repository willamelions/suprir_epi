<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryMove extends Model
{
    use HasFactory;

    protected $table = 'inventory_moves';

    protected $fillable = [
        'obra_id',
        'item_id',
        'employee_id',
        'quantity',
        'type',
        'reason',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
