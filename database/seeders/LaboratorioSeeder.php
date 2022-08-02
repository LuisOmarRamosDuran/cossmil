<?php

namespace Database\Seeders;

use App\Models\laboratorio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaboratorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        laboratorio::factory()->count(20)->create();
    }
}
