<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('usuario_id');
            $table->dateTime('fecha_creacion');
            $table->enum('activo', ['Y', 'N']);
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->string('email',100)->unique();
            $table->string('password', 100);
            $table->unsignedInteger('rol_id');

            $table->foreign('rol_id')->references('rol_id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
