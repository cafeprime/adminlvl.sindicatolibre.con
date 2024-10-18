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
        Schema::create('notificaciones_elim', function (Blueprint $table) {
            $table->increments('IDNOTIFICACION');
            $table->integer('IDELIM');
            $table->integer('IDUSUARIO');
            $table->boolean('NOTIFICADO')->default(1);
            $table->boolean('VISTO')->default(1);
            $table->primary(['IDNOTIFICACION', 'IDELIM', 'IDUSUARIO']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificaciones_elim');
    }
};
