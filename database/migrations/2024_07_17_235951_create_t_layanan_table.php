<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTLayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('T_LAYANAN', function (Blueprint $table) {
            $table->increments('ID_LAYANAN');
            $table->string('NO_ANTRIAN', 50)->nullable();
            $table->integer('ID_PENGUNJUNG')->nullable();
            $table->string('SUBJEK', 255)->nullable();
            $table->integer('ID_JENISDEPARTEMEN')->nullable();
            $table->integer('ID_JENISLAYANAN')->nullable();
            $table->integer('ID_JENISKANAL')->nullable();
            $table->integer('ID_JENISPRIORITAS')->nullable();
            $table->integer('ID_JENISTIKET')->nullable();
            $table->integer('ID_JENISPENGGUNA')->nullable();
            $table->integer('ID_JENISKELAMIN')->nullable();
            $table->string('DETAIL_UNITKERJA', 255)->nullable();
            $table->string('INITIAL_AGENT', 255)->nullable();
            $table->timestamp('WAKTU_LAYANAN_MULAI')->nullable();
            $table->timestamp('WAKTU_LAYANAN_SELESAI')->nullable();
            $table->text('PERTANYAAN')->nullable();
            $table->text('JAWABAN')->nullable();
            $table->string('NOTE', 255)->nullable();
            $table->boolean('STATUS')->nullable();
            $table->string('DIBUAT_OLEH', 50)->nullable();
            $table->timestamp('DIBUAT_TANGGAL')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('T_LAYANAN');
    }
}
