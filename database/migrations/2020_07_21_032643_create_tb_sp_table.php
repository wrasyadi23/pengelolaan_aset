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
            $table->string('kd_sp', 45)->unique();
            $table->string('no_sp', 45);
            $table->text('deskripsi', 255)->nullable();
            $table->text('uraian', 255)->nullable();
            $table->text('keterangan', 255)->nullable();
            $table->date('tgl');
            $table->decimal('harga', 15, 2)->nullable();
            $table->integer('jml')->nullable();
            $table->string('satuan', 45)->nullable();
            $table->string('rekanan', 45)->nullable();
            $table->string('jenis_sp', 45);
            $table->string('status', 45);
            $table->string('kd_aktifitas_rkap', 45);
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
