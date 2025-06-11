<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perfil_doctores', function (Blueprint $table) {
            $table->increments('doctor_id');
            $table->string('licencia',10);
            $table->string('especialidad',50);
            $table->string('ubicacion',200);
            $table->unsignedInteger('usuario_id');

            $table->foreign('usuario_id')->references('usuario_id')->on('usuarios')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perfil_doctores');
    }
};
