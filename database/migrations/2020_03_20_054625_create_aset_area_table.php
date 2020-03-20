<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsetAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aset_area', function (Blueprint $table) {
            $table->id();
            $table->string('kd_aset',45);
            $table->string('kd_area',45);
            $table->string('kd_alamat',45);
            $table->string('kd_keterangan',45);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aset_area');
    }
}
