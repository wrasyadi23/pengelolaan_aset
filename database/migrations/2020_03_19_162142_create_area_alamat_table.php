<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaAlamatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_alamat', function (Blueprint $table) {
            $table->id();
            $table->string('kd_alamat',45)->unique();
            $table->string('alamat',45);
            $table->string('kd_area',45)->foreign()->reference('kd_area')->on('area')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_alamat');
    }
}
