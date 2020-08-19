<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUangmukaNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uangmuka_notes', function (Blueprint $table) {
            $table->id();
            $table->string('kd_uangmuka', 45);
            $table->date('tgl');
            $table->text('catatan');
            $table->string('status', 45);
            $table->string('nik', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uangmuka_notes');
    }
}
