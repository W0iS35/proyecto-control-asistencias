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
        Schema::create('justificacion', function (Blueprint $table) {
            $table->id();
            // Id justificacdor
            $table->unsignedBigInteger('justificador_id');

            // Referencias
            $table->unsignedBigInteger('pariente_id');
            $table->unsignedBigInteger('evidencia_id');
            $table->timestamps();

            $table->foreign('pariente_id')->references('id')->on('pariente');
            $table->foreign('evidencia_id')->references('id')->on('evidencia');

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('justificacion');
    }
}
