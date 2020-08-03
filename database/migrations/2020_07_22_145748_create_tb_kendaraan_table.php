<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kendaraan', function (Blueprint $table) {
            $table->id();
            $table->string('kd_kendaraan', 45)->unique();
            $table->string('nopol', 45);
            $table->string('merk', 45);
            $table->string('type', 45);
            $table->integer('tahun');
            $table->string('warna', 45);
            $table->string('jenis', 45);
            $table->string('jenis_bbm', 45);
            $table->decimal('jml_bbm', 8, 2);
            $table->string('no_bpkb', 45);
            $table->string('no_stnk', 45);
            $table->string('no_mesin', 45);
            $table->string('no_rangka', 45);
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
        Schema::dropIfExists('tb_kendaraan');
    }
}
