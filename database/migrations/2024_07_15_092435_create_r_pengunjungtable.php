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
        Schema::create('R_PENGUNJUNG', function (Blueprint $table) {
            $table->id('ID_PENGUNJUNG'); // Auto-incrementing primary key
            $table->string('TELEPON');
            $table->string('NIP_NIK');
            $table->string('NAMA');
            $table->string('EMAIL');
            $table->string('INSTANSI_UNIT');
            // $table->timestamps(); // Optional if you want to track created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('R_PENGUNJUNG');
    }
};
