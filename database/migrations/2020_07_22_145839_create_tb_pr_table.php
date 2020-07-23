<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pr', function (Blueprint $table) {
            $table->id();
            $table->string('kd_pr', 45)->unique();
            $table->string('no_pr', 45);
            $table->date('tgl');
            $table->string('kd_sr', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pr');
    }
}
