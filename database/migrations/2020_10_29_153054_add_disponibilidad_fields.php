<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDisponibilidadFields extends Migration
{
    public function up()
    {
        Schema::table('empastes', function(Blueprint $table){
            $table->string('disponibilidad');
        });
        //second table modification
        Schema::table('direccion_juridica', function(Blueprint $table){
            $table->string('disponibilidad');
        });
        Schema::table('fiscalizacion', function(Blueprint $table){
            $table->string('disponibilidad');
        });
        Schema::table('fondo', function(Blueprint $table){
            $table->string('disponibilidad');
        });
        Schema::table('gaceta', function(Blueprint $table){
            $table->string('disponibilidad');
        });
        Schema::table('mineria_ilegal', function(Blueprint $table){
            $table->string('disponibilidad');
        });
        Schema::table('planificacion', function(Blueprint $table){
            $table->string('disponibilidad');
        });
        Schema::table('recurso_humano', function(Blueprint $table){
            $table->string('disponibilidad');
        });
        Schema::table('regional', function(Blueprint $table){
            $table->string('disponibilidad');
        });
        Schema::table('unidad_tecnica', function(Blueprint $table){
            $table->string('disponibilidad');
        });
    }
    
    public function down()
    {
        //
    }
}
