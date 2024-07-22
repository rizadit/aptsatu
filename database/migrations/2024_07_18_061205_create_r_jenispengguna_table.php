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
        Schema::create('R_JENISPENGGUNA', function (Blueprint $table) {
            $table->integer('ID_JENISPENGGUNA')->primary();
            $table->string('URAIAN_JENISPENGGUNA', 50)->nullable();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('R_JENISPENGGUNA');
    }
};
