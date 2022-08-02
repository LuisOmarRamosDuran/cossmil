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
        Schema::create('evolucion_especialidad', function (Blueprint $table) {
            $table->unsignedBigInteger('id_evolucion');
            $table->foreign('id_evolucion')->references('id')->on('evolucion')->onDelete('cascade');
            $table->unsignedBigInteger('id_especialidad');
            $table->foreign('id_especialidad')->references('id')->on('especialidad')->onDelete('cascade');
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
        Schema::dropIfExists('evolucion_especialidad');
    }
};
