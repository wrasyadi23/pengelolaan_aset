<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPekerjaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->string('booknumber',45)->unique();
            // requester info ambil dari Auth
            $table->string('nama',45);
            $table->string('nik',45);
            $table->string('telepon',45);
            // job info 
            $table->string('kd_area',45);
            $table->string('kd_alamat',45);
            $table->string('kd_keterangan',45);
            $table->string('kd_klasifikasi_pekerjaan',45);
            $table->datetime('tanggal_pekerjaan');
            $table->date('tanggal_pelaksanaan');
            $table->text('uraian');
            $table->string('status',45);
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
        Schema::dropIfExists('tb_pekerjaan');
    }
}
