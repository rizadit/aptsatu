<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->integer('administrasi_layanan');
            $table->integer('prosedur_layanan');
            $table->integer('waktu_layanan');
            $table->integer('biaya_layanan');
            $table->integer('kompetensi_petugas');
            $table->integer('kesopanan_petugas');
            $table->integer('kualitas_sarana');
            $table->integer('ketersediaan_kanal');
            $table->text('saran_kritik')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surveys');
    }
}
