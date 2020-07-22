<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbSpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sp', function (Blueprint $table) {
            $table->id();
            $table->string('kd_sp',25);
            $table->string('no_sp',255);
            $table->string('cost_center',15);
            $table->string('gl_account',15);
            $table->string('id_aktifitas_rkap',15);
            $table->string('deskripsi',255);
            $table->string('uraian',255);
            $table->string('keterangan',255);
            $table->date('tgl');
            $table->string('jenis',45);
            $table->decimal('harga',8, 2);
            $table->integer('jml');
            $table->string('satuan',15);
            $table->string('rekanan',15);
            $table->string('status',15);
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
        Schema::dropIfExists('tb_sp');
    }
}
