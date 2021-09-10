<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaIncidentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_incidentes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('incidente_id');
            $table->unsignedBigInteger('alumno_id');

            
            $table->foreign('incidente_id')->references('id')->on('incidente');
            $table->foreign('alumno_id')->references('id')->on('alumno');


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
        Schema::dropIfExists('ficha_incidentes');
    }
}
