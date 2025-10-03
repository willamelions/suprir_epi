<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contrato;
use App\Models\Fornecedor;

class ContratosSeeder extends Seeder
{
    public function run()
    {
        $fornecedor = Fornecedor::first();

        if ($fornecedor) {
            Contrato::create([
                'fornecedor_id' => $fornecedor->id,
                'descricao' => 'Contrato de fornecimento mensal de EPIs',
                'valor' => 5000.00,
                'data_inicio' => now()->toDateString(),
                'data_fim' => now()->addYear()->toDateString(),
            ]);
        }
    }
}
