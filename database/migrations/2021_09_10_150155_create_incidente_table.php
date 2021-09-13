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
            $table->unsignedBigInteger('ficha_id');
            $table->unsignedBigInteger('auxiliar_id');
            $table->string('descripcion', 100);
            $table->string('nombre_apoderado');
            $table->unsignedBigInteger('pariente_id');
            $table->enum('estado', ['pendiente', 'resuelto']);


            // Referencias
            $table->foreign('auxiliar_id')->references('id')->on('users');  
            $table->foreign('pariente_id')->references('id')->on('parientes'); 
            $table->foreign('ficha_id')->references('id')->on('ficha_incidentes');

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
