<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyStateTables extends Migration
{
    public function up()
    {
        Schema::table('auditoria', function(Blueprint $table){
            $table->string('disponibilidad');
        });
        //second table modification
        Schema::table('asesor', function(Blueprint $table){
            $table->string('disponibilidad');
        });
    }

    public function down()
    {
        //
    }
}