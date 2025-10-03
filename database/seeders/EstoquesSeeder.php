<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estoque;
//use App\Models\Loja;
use App\Models\Item;
use App\Models\Obra;

class EstoquesSeeder extends Seeder
{
    public function run()
    {
        $obra = Obra::first();
        $itens = Item::all();

        if ($obra && $itens->count()) {
            foreach ($itens as $item) {
                Estoque::updateOrCreate(
                    [
                        'obra_id' => $obra->id,
                        'item_id' => $item->id,
                    ],
                    [
                        'quantidade' => rand(10, 100),
                        'saldo_minimo' => 5,
                    ]
                );
            }
        }
    }
}
