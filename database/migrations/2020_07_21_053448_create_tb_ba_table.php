<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_ba', function (Blueprint $table) {
            $table->id();
            $table->string('kd_ba', 45)->unique();
            $table->string('no_ba', 45);
            $table->text('uraian');
            $table->date('tgl');
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->string('kd_sp', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_ba');
    }
}
