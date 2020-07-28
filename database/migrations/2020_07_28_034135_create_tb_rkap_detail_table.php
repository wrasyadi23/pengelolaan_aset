<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbRkapDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_rkap_detail', function (Blueprint $table) {
            $table->id();
            $table->string('kd_aktifitas_rkap', 45)->unique();
            $table->string('aktifitas', 45);
            $table->string('nama_aktifitas', 45);
            $table->text('uraian');
            $table->decimal('nilai_aktifitas', 15, 2);
            $table->string('kd_rkap', 45);
            $table->string('kd_bagian', 45);
            $table->string('kd_seksi', 45);
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
        Schema::dropIfExists('tb_rkap_detail');
    }
}
