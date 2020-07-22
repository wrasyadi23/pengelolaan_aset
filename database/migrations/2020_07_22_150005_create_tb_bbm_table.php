<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBbmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_bbm', function (Blueprint $table) {
            $table->id();
            $table->string('kd_bbm', 45)->unique();
            $table->date('tgl_isi');
            $table->string('jenis_bbm', 45);
            $table->integer('jml', 8, 2);
            $table->integer('oddo', 10, 0);
            $table->string('pemohon', 45);
            $table->string('keterangan', 45);
            $table->string('status', 45);
            $table->date('tgl_realisasi');
            $table->integer('harga_realisasi', 15, 2);
            $table->string('kd_aktifitas', 45);
            $table->string('kd_kendaraan', 45);
            $table->string('nopol', 45);
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
        Schema::dropIfExists('tb_bbm');
    }
}
