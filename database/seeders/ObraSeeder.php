<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObraSeeder extends Seeder
{
    public function run()
    {
        DB::table('obras')->insert([
            [
                'nome'       => 'Obra Central',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome'       => 'Obra Norte',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
