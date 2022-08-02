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
        Schema::create('evolucion_sucursal', function (Blueprint $table) {
            $table->unsignedBigInteger('id_evolucion');
            $table->foreign('id_evolucion')->references('id')->on('evolucion')->onDelete('cascade');
            $table->unsignedBigInteger('id_sucursal');
            $table->foreign('id_sucursal')->references('id')->on('sucursal')->onDelete('cascade');
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
        Schema::dropIfExists('evolucion_sucursal');
    }
};
