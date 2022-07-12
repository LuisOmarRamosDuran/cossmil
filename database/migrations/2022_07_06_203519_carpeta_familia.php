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
        Schema::create('carpeta_familiar', function (Blueprint $table) {
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_lab');
            $table->foreign('id_lab')->references('id')->on('laboratorio')->onDelete('cascade');
            $table->unsignedBigInteger('id_doc');
            $table->foreign('id_doc')->references('id')->on('documento')->onDelete('cascade');
            $table->unsignedBigInteger('id_receta');
            $table->foreign('id_receta')->references('id')->on('receta')->onDelete('cascade');
            $table->unsignedBigInteger('id_evolucion');
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
