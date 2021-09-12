<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJustificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('justificaciones', function (Blueprint $table) {
            $table->id();
            // Id justificacdor
            $table->unsignedBigInteger('justificador_id');
            $table->unsignedBigInteger('incidente_id'); 
            $table->unsignedBigInteger('evidencia_id');

            $table->timestamps();


            // Referencias
            $table->foreign('incidente_id')->references('id')->on('incidentes'); 
            $table->foreign('justificador_id')->references('id')->on('users');   
            $table->foreign('evidencia_id')->references('id')->on('evidencias');

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('justificaciones');
    }
}
