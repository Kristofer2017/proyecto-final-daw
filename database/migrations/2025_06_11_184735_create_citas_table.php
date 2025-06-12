<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('cita_id');
            $table->dateTime('fecha_programada');
            $table->enum('estado', ['Completada', 'En Progreso', 'Cancelada']);
            $table->string('notas',100);
            $table->unsignedInteger('paciente_id');
            $table->unsignedInteger('doctor_id');

            $table->foreign('paciente_id')->references('paciente_id')->on('perfil_pacientes')->onDelete('cascade');
            $table->foreign('doctor_id')->references('doctor_id')->on('perfil_doctores')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
