<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRSrSewaPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_sr_sewa_pivot', function (Blueprint $table) {
            $table->id();
            $table->string('kd_sr',45);
            $table->string('kd_kendaraan',45);
            $table->string('kd_tarif',45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r_sr_sewa_pivot');
    }
}
