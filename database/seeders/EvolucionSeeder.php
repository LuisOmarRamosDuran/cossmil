<?php

namespace Database\Seeders;

use App\Models\evolucion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvolucionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        evolucion::factory()->count(20)->create();
    }
}
