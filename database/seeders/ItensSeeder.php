<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItensSeeder extends Seeder
{
    public function run()
    {
        Item::insert([
            ['nome' => 'Capacete de Segurança', 'categoria' => 'Proteção Cabeça', 'unidade' => 'un', 'preco_unitario' => 45.00, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Luva de Raspa', 'categoria' => 'Proteção Mãos', 'unidade' => 'par', 'preco_unitario' => 12.50, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Bota de Segurança', 'categoria' => 'Proteção Pés', 'unidade' => 'par', 'preco_unitario' => 120.00, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Cinto de Segurança', 'categoria' => 'Proteção Queda', 'unidade' => 'un', 'preco_unitario' => 200.00, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
