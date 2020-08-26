<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ext_dates')->nullable();
            $table->string('description');
            $table->string('background')->nullable();
            $table->string('quantity')->nullable();
            $table->string('num_folios')->nullable();
            $table->string('observations')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
