<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRDepartemenTable extends Migration
{
    public function up()
    {
        Schema::create('r_departemen', function (Blueprint $table) {
            $table->id('ID_DEPARTEMEN');
            $table->string('DEPARTEMEN');
            $table->text('URAIAN_DEPARTEMEN')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('r_departemen');
    }
};
