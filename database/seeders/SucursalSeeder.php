<?php

namespace Database\Seeders;

use App\Models\sucursal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        sucursal::create([
            "nombre"=>"Santa Cruz",
        ]);//
    }
}
