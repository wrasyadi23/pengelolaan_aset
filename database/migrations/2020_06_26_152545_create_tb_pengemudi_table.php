<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPengemudiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pengemudi', function (Blueprint $table) {
            $table->id();
            $table->string('kd_pengemudi', 45);
            $table->string('nama', 45);
            $table->string('nik', 45);
            $table->string('tmpt_lahir', 45);
            $table->date('tgl_lahir');
            $table->date('tgl_masuk');
            $table->date('tgl_pensiun');
            $table->string('jenis_kelamin', 45);
            $table->string('kualifikasi', 45);
            $table->string('jabatan', 45);
            $table->decimal('upah', 15, 2);
            $table->decimal('lembur', 15, 2);
            $table->decimal('lumpsum', 15, 2);
            $table->decimal('uang_sppd', 15, 2);
            $table->decimal('uang_sppd_tagihan', 15, 2);
            $table->decimal('uang_lain', 15, 2);
            $table->decimal('uang_lain_tagihan', 15, 2);
            $table->decimal('uang_makan', 15, 2);
            $table->string('status', 45);
            $table->string('kd_ba', 45);
            $table->string('kd_departemen', 45);
            $table->string('kd_bagian', 45);
            $table->string('kd_seksi', 45);
            $table->string('kd_regu', 45);
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
        Schema::dropIfExists('tb_pengemudi');
    }
}
