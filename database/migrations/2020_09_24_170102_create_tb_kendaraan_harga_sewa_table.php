<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKendaraanHargaSewaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kendaraan_harga_sewa', function (Blueprint $table) {
            $table->id();
            $table->string('kd_tarif',45)->unique();
            $table->string('klasifiksai_tarif',45);
            $table->string('merk',45);
            $table->string('type',45);
            $table->string('jenis_kend',45);
            $table->string('harga',45);
            $table->string('kd_ba',45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kendaraan_harga_sewa');
    }
}
