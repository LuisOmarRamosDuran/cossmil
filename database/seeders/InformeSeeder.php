<?php

namespace Database\Seeders;

use App\Models\informe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        informe::factory()->count(20)->create();
    }
}
