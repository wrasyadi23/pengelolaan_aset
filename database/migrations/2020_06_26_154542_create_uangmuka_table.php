<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUangmukaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uangmuka', function (Blueprint $table) {
            $table->id();
            $table->string('kd_uangmuka', 45)->unique();
            $table->string('no_uangmuka', 45);
            $table->date('tgl');
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->text('uraian');
            $table->decimal('nilai_uangmuka', 15, 2);
            $table->decimal('nilai_realisasi_uangmuka', 15, 2);
            $table->decimal('nilai_sisa_uangmuka', 15, 2);
            $table->string('status', 45);
            $table->string('nik', 45);
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
        Schema::dropIfExists('uangmuka');
    }
}
