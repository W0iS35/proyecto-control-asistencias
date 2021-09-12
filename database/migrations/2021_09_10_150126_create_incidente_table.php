<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidentes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('auxiliar_id');
            $table->string('descripcion', 100);
            $table->enum('estado', ['pendiente', 'resuelto']);


            // Referencias
            $table->unsignedBigInteger('justificacion_id'); 
            $table->foreign('justificacion_id')->references('id')->on('justificaciones');


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
        Schema::dropIfExists('incidentes');
    }
}
