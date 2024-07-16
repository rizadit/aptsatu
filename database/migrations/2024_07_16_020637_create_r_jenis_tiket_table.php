<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRJenisTiketTable extends Migration
{
    public function up()
    {
        Schema::create('r_jenis_tiket', function (Blueprint $table) {
            $table->id('ID_JENIS_TIKET');
            $table->string('JENIS_TIKET');
            $table->text('URAIAN_JENIS_TIKET')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('r_jenis_tiket');
    }
};