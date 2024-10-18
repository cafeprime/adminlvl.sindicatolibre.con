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
        Schema::create('fppf', function (Blueprint $table) {
            $table->increments('IDFPPF');
            $table->integer('IDREGISTRO');
            $table->boolean('FASJ_PRODUCTOS')->default(0);
            $table->boolean('FASJ_DISTRIBUCION')->default(0);
            $table->boolean('FASJ_CENTROS')->default(0);
            $table->boolean('FAJE_PRODUCTOS')->default(0);
            $table->boolean('FAJE_DISTRIBUCION')->default(0);
            $table->boolean('FAJE_CENTROS')->default(0);
            $table->primary(['IDFPPF', 'IDREGISTRO']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fppf');
    }
};
