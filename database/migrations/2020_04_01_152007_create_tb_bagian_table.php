<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBagianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_bagian', function (Blueprint $table) {
            $table->id();
            $table->string('kd_bagian',45)->unique();
            $table->string('bagian',45);
            $table->string('kd_departemen',45)->foreign()->reference('kd_departemen')->on('tb_departemen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_bagian');
    }
}
