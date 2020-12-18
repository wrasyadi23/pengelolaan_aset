<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRAsetHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_aset_history', function (Blueprint $table) {
            $table->id();
            $table->string('kd_aset', 45);
            $table->string('kd_aset_reg', 45);
            $table->string('merk', 45);
            $table->string('type', 45);
            $table->integer('tahun');
            $table->string('warna', 45);
            $table->string('kategori', 45);
            $table->string('jenis', 45);
            $table->string('keterangan', 45);
            $table->string('status', 45);
            $table->string('kd_direktorat', 45);
            $table->string('kd_kompartemen', 45);
            $table->string('kd_departemen', 45);
            $table->string('kd_bagian', 45);
            $table->string('kd_seksi', 45);
            $table->string('kd_regu', 45);
            $table->string('kd_alamat', 45);
            $table->string('kd_keterangan', 45);
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
        Schema::dropIfExists('r_aset_history');
    }
}
