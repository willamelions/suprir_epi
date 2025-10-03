<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            ObraSeeder::class,
            FornecedorSeeder::class,
            ItensSeeder::class,
            EstoquesSeeder::class,
            ConsumosSeeder::class,
            ContratosSeeder::class,
        ]);
    }
}
