<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perfil_pacientes', function (Blueprint $table) {
            $table->increments('paciente_id');
            $table->date('fecha_nacimiento');
            $table->string('telefono',9);
            $table->unsignedInteger('usuario_id');

            $table->foreign('usuario_id')->references('usuario_id')->on('usuarios')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perfil_pacientes');
    }
};
