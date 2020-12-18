<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRAreaKeteranganHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_area_keterangan_history', function (Blueprint $table) {
            $table->id();
            $table->string('kd_keterangan',45);
            $table->string('keterangan',45);
            $table->string('kd_alamat',45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r_area_keterangan_history');
    }
}
