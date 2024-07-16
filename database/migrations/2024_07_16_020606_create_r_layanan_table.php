<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRLayananTable extends Migration
{
    public function up()
    {
        Schema::create('r_layanan', function (Blueprint $table) {
            $table->id('ID_LAYANAN');
            $table->string('LAYANAN');
            $table->text('URAIAN_LAYANAN')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('r_layanan');
    }
};
