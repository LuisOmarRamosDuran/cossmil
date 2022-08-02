<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\rol;
class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      rol::create([
            "nombre_rol"=>"paciente",
        ]);
        rol::create([
            "nombre_rol"=>"medico",
        ]);
        rol::create([
            "nombre_rol"=>"administrador",
        ]);
        
      //  Rol::factory()->count(20)->create();
    }
}
