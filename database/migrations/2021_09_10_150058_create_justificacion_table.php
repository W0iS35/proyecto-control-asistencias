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

            // Referencias
            $table->unsignedBigInteger('pariente_id');
            $table->unsignedBigInteger('evidencia_id');
            $table->timestamps();

            $table->foreign('pariente_id')->references('id')->on('parientes');
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
