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
        Schema::create('provincias', function (Blueprint $table) {
            $table->increments('ID_PROVINCIA');
            $table->string('PROVINCIA', 100);
            $table->string('ID_PROV_ENC', 255);
            $table->primary(['ID_PROVINCIA', 'ID_PROV_ENC']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provincias');
    }
};
