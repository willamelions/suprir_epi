<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder


{
    public function run()
    {
        Fornecedor::insert([
            ['nome' => 'EPI Brasil Ltda', 'contato' => 'contato@epibrasil.com', 'telefone' => '(85) 99999-1111', 'email' => 'contato@epibrasil.com', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Protege Equipamentos', 'contato' => 'vendas@protege.com', 'telefone' => '(85) 98888-2222', 'email' => 'vendas@protege.com', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Segurança Total', 'contato' => 'atendimento@segurancatotal.com', 'telefone' => '(85) 97777-3333', 'email' => 'atendimento@segurancatotal.com', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
