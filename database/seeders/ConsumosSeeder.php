<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Consumo;
use App\Models\Loja;
use App\Models\Item;
use App\Models\Obra;

class ConsumosSeeder extends Seeder
{
    public function run()
    {
        $obra = Obra::first();
        $item = Item::first();

        if ($obra && $item) {
            Consumo::create([
                'obra_id' => $obra->id,
                'item_id' => $item->id,
                'quantidade' => 2,
                'responsavel' => 'Carlos',
                'cpf_funcionario' => '1234567891011',
                'data_consumo' => now(),
            ]);
        }
    }
}
