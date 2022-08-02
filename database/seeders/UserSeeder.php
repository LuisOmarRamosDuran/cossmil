<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Faker\Generator;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "id_rol"=>1,
            "nombre"=>"juan",
            "ap_paterno"=>"ramos",
            "ap_materno"=>"torrico",
            "ap_esposo"=>"ramos",
            "matricula"=>"922406RDL",
            "password"=>Hash::make("8318860"),
            "fecha_nacimiento"=>$this->faker->date(),
            "ci"=>"8318860",
            "tipo_sangre"=>"orh+",
            "grado"=>"tte",
            "fuerza"=>"ejercito",
            "id_genero"=>1,
        ]);
        User::create([
            "id_rol"=>1,
            "nombre"=>"pablo",
            "ap_paterno"=>"ramos",
            "ap_materno"=>"torrico",
            "ap_esposo"=>"ramos",
            "matricula"=>"922406RDL",
            "password"=>Hash::make("8318860"),
            "fecha_nacimiento"=>"24/06/1992",
            "ci"=>"8318860",
            "tipo_sangre"=>"orh+",
            "grado"=>"tte",
            "fuerza"=>"ejercito",
            "id_genero"=>1,
        ]);
        User::create([
            "id_rol"=>1,
            "nombre"=>"carlos",
            "ap_paterno"=>"ramos",
            "ap_materno"=>"torrico",
            "ap_esposo"=>"ramos",
            "matricula"=>"922406RDL",
            "password"=>Hash::make("8318860"),
            "fecha_nacimiento"=>"24/06/1992",
            "ci"=>"8318860",
            "tipo_sangre"=>"orh+",
            "grado"=>"tte",
            "fuerza"=>"ejercito",
            "id_genero"=>1,
        ]);
    }
}
