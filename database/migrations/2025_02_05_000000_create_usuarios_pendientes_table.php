<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosPendientesTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios_pendientes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('estado')->default('pendiente'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios_pendientes');
    }
}