<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('R_USER', function (Blueprint $table) {
            $table->id('ID_USER');
            $table->string('USERNAME');
            $table->string('PASSWORD');
            $table->string('ROLE');
            $table->unsignedBigInteger('ID_KANTOR');
            $table->timestamp('CREATED_DATE')->useCurrent();
            $table->boolean('IS_AKTIF');
            $table->foreign('ID_KANTOR')->references('ID_KANTOR')->on('R_KANTOR')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('R_USER');
    }
}
