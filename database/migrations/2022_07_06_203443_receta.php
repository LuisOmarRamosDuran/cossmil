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
        Schema::create('receta', function (Blueprint $table) {
            $table->id();
            $table->integer('codigoReceta');
            $table->unsignedBigInteger('id_responsable');
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_evolucion');
            $table->string('medicamento');
            $table->integer('cantidad');
            $table->string('aplicacionMedicamento');
            $table->foreign('id_responsable')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_paciente')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_evolucion')->references('id')->on('evolucion')->onDelete('cascade');
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
        //
    }
};
