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
        Schema::create('registros_elim', function (Blueprint $table) {
            $table->increments('IDELIMINADO');
            $table->integer('IDREGISTRO');
            $table->string('NOMBRE', 100);
            $table->string('APELLIDO1', 100);
            $table->string('APELLIDO2', 100);
            $table->string('DNI', 15);
            $table->string('DNI_LETRA', 1);
            $table->string('PROVINCIA');
            $table->string('EMAIL', 191);
            $table->string('TELEFONO', 20)->nullable();
            $table->string('COLECTIVO', 30)->nullable();
            $table->string('CUOTA', 30)->nullable();
            $table->integer('PLAN1')->nullable();
            $table->integer('PLAN2')->nullable();
            $table->string('ADMINREG', 40);
            $table->integer('ADMINID')->nullable();
            $table->timestamp('FECHA_INSCRIPCION')->nullable();
            $table->timestamp('FECHA_MODIFICACION')->nullable();
            $table->timestamp('FECHA_ELIMINACION')->nullable();
            $table->integer('ELIMINADO_POR')->nullable();
            $table->boolean('SUBIDO_MASIVAMENTE')->default(0);
            $table->boolean('VISTO')->default(1); //eliminar este campo cuando se traigan los datos de la tabla original
            $table->boolean('NOTIFICADO')->default(1); //eliminar este campo cuando se traigan los datos de la tabla original
            $table->boolean('RECUPERADO')->default(0);
            $table->timestamp('FECHA_RECUPERADO')->nullable();
            $table->primary(['IDELIMINADO', 'IDREGISTRO', 'DNI', 'DNI_LETRA', 'PROVINCIA', 'EMAIL', 'ADMINREG']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros_elim');
    }
};
