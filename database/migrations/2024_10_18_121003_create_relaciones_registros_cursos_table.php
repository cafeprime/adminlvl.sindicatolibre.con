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
        Schema::create('relaciones_registros_cursos', function (Blueprint $table) {
            $table->increments('IDRELACION');
            $table->integer('ID_CURSO')->nullable();
            $table->integer('REPE_CURSO')->nullable();
            $table->integer('ID_REGISTRO');
            $table->primary(['IDRELACION', 'ID_REGISTRO']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relaciones_registros_cursos');
    }
};
