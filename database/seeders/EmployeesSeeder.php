<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    public function run(): void
    {
        if (Employee::count() === 0) {
            Employee::create([
                'name' => 'Funcionário Piloto',
                'cpf' => '00000000191',
                'role' => 'Pedreiro',
                'site_id' => 1,
                'active' => true,
            ]);
        }
    }
}
