<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKompartemenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kompartemen', function (Blueprint $table) {
            $table->id();
            $table->string('kd_kompartemen', 45)->unique();
            $table->string('kompartemen', 45);
            $table->string('kd_direktorat', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kompartemen');
    }
}
