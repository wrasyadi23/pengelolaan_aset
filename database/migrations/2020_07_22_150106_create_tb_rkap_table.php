<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbRkapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_rkap', function (Blueprint $table) {
            $table->id();
            $table->string('kd_rkap', 45)->unique();
            $table->string('cost_center', 45);
            $table->string('gl_acc', 45);
            $table->year('tahun_rkap');
            $table->decimal('nilai_rkap', 15, 2);
            $table->string('status', 45);
            $table->string('kd_departemen', 45);
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
        Schema::dropIfExists('tb_rkap');
    }
}
