<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRKompartemenHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_kompartemen_history', function (Blueprint $table) {
            $table->id();
            $table->string('kd_kompartemen', 45);
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
        Schema::dropIfExists('r_kompartemen_history');
    }
}
