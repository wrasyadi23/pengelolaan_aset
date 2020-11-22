<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbSrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sr', function (Blueprint $table) {
            $table->id();
            $table->string('kd_sr', 45)->unique();
            $table->string('no_sr', 45);
            $table->date('tgl');
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->string('jenis_sr', 45);
            $table->string('status', 45);
            $table->string('kd_ba', 45);
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
        Schema::dropIfExists('tb_sr');
    }
}
