<?php

namespace Database\Seeders;

use App\Models\especialidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     /*   rol::create([
            "nombre_rol"=>"paciente",
        ]);
        rol::create([
            "nombre_rol"=>"medico",
        ]);
        rol::create([
            "nombre_rol"=>"administrador",    ver especialidades
        ]);
*/


        especialidad::factory()->count(20)->create();
    }
}
