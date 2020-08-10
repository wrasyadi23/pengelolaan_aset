<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkirtolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkirtol', function (Blueprint $table) {
            $table->id();
            $table->string('kd_parkirtol', 45)->unique();
            $table->string('nik', 45);
            $table->date('tgl');
            $table->date('trip_start');
            $table->date('trip_end');
            $table->string('melayani', 45);
            $table->string('uraian', 45);
            $table->string('status', 45);
            $table->date('tgl_bayar')->nullable();
            $table->string('creator', 45);
            $table->string('kd_uangmuka', 45);
            $table->string('kd_pengemudi', 45);
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
        Schema::dropIfExists('parkirtol');
    }
}
