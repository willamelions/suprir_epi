<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
        'role',
        'site_id',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function site()
    {
        return $this->belongsTo(Obra::class, 'site_id');
    }
}
