<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPekerjaanKlasifikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pekerjaan_klasifikasi', function (Blueprint $table) {
            $table->id();
            $table->string('kd_klasifikasi_pekerjaan',45)->unique();
            $table->string('klasifikasi_pekerjaan',45);
            $table->string('kd_regu',45)->foreign()->reference('kd_regu')->on('tb_regu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pekerjaan_klasifikasi');
    }
}
