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
            $table->integer('ID_USUARIO')->primary();
            $table->string('NOMBRE');
            $table->string('USUARIO');
            $table->string('CONTRASENA');
            $table->string('PROVINCIA');
            $table->string('ID_SESION');
            $table->integer('ROL')->default(2);
            $table->timestamp('FECHA_CREACION')->useCurrent();
            $table->string('FOTO')->nullable();
            $table->integer('ACTIVADO')->default(1);
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
