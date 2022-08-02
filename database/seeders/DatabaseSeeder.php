<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this ->call(RolSeeder::class);
        $this ->call(GeneroSeeder::class);
        $this ->call(SucursalSeeder::class);
        $this ->call(InformeSeeder::class);
        $this ->call(EspecialidadSeeder::class);
        $this ->call(DocumentoSeeder::class);
        $this ->call(EvolucionSeeder::class);
       
    }
}

