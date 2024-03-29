<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rol');
            $table->string('nombre');
            $table->string('ap_paterno');
            $table->string('ap_materno');
            $table->string('ap_esposo');
            $table->string('matricula');
            $table->string('email');
            $table->string('password');
            $table->date('fecha_nacimiento');
            $table->string('ci');
            $table->string('tipo_sangre');
            $table->string('grado')->nullable();
            $table->string('fuerza');
            $table->unsignedBigInteger('id_genero');
            $table->foreign('id_genero')->references('id')->on('genero')->onDelete('cascade');
            $table->rememberToken();
            $table->foreign('id_rol')->references('id')->on('rol')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
