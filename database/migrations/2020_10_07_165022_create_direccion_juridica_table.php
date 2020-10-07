<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionJuridicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion_juridica', function (Blueprint $table) {
            $table->id();
            $table->string('estante');
            $table->integer('cuerpo');
            $table->integer('balda');
            $table->string('contenedor');
            $table->string('gestion');
            $table->string('descripcion');
            $table->string('antecedente');
            $table->string('data_institucional');
            $table->integer('ambiente');
            $table->string('observaciones');
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
        Schema::dropIfExists('direccion_juridica');
    }
}
