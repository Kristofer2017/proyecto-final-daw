<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pacientes_seguros', function (Blueprint $table) {
            $table->id();
            $table->enum('activo', ['Y', 'N']);
            $table->string('tipo_plan', 100);
            $table->string('numero_seguro', 100);

            $table->unsignedInteger('seguro_id');
            $table->unsignedInteger('paciente_id');

            $table->foreign('seguro_id')->references('seguro_id')->on('seguros')->onDelete('cascade');
            $table->foreign('paciente_id')->references('paciente_id')->on('perfil_pacientes')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pacientes_seguros');
    }
};
