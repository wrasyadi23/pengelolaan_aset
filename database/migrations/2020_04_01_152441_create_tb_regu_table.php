<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbReguTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_regu', function (Blueprint $table) {
            $table->id();
            $table->string('kd_regu',45)->unique();
            $table->string('regu',45);
            $table->string('kd_seksi',45)->foreign()->reference('kd_seksi')->on('tb_seksi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_regu');
    }
}
