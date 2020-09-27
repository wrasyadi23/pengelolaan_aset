<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRKendaraanHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_kendaraan_history', function (Blueprint $table) {
            $table->id();
            $table->string('kd_kendaraan', 45)->unique();
            $table->string('nopol', 45);
            $table->string('merk', 45);
            $table->string('type', 45);
            $table->integer('tahun');
            $table->string('warna', 45)->nullable();
            $table->string('jenis_kend', 45);
            $table->string('jenis_bbm', 45)->nullable();
            $table->decimal('jml_bbm', 8, 2)->nullable();
            $table->string('no_bpkb', 45)->nullable();
            $table->string('no_stnk', 45)->nullable();
            $table->string('no_mesin', 45)->nullable();
            $table->string('no_rangka', 45)->nullable();
            $table->string('jenis_sewa', 45);
            $table->string('status', 45)->nullable();
            $table->string('kd_ba', 45);
            $table->string('kd_tarif', 45)->nullable();
            $table->string('kd_departemen', 45)->nullable();
            $table->string('kd_bagian', 45)->nullable();
            $table->string('kd_seksi', 45)->nullable();
            $table->string('kd_regu', 45)->nullable();
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
        Schema::dropIfExists('r_kendaraan_history');
    }
}
