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
        //
        Schema::create('R_JENILAYANAN', function (Blueprint $table) {
            $table->id('ID_JENISLAYANAN');
            $table->text('URAIAN_JENISLAYANAN')->nullable();
            $table->unsignedBigInteger('ID_DEPARTEMEN'); // Tambahkan kolom foreign key
            $table->foreign('ID_DEPARTEMEN')->references('ID_DEPARTEMEN')->on('r_departemen'); // Tetapkan foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('R_JENILAYANAN');
    }
};
