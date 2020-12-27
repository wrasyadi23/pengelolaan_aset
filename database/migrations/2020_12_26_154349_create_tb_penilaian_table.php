<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_penilaian', function (Blueprint $table) {
            $table->id();
            $table->string('kd_penilaian', 45)->unique();
            $table->decimal('nilai', 1, 0);
            $table->date('tgl');
            $table->text('catatan');
            $table->string('kd_pekerjaan', 45); //<- kode seluruh pekerjaan 
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
        Schema::dropIfExists('tb_penilaian');
    }
}
