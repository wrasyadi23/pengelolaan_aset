<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nama',45);
            $table->string('nik',45)->unique();
            $table->string('tempat_lahir',45);
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin',45);
            $table->string('jabatan',45);
            $table->string('golongan',45);
            $table->string('kd_departemen',45);
            $table->string('kd_bagian',45);
            $table->string('kd_seksi',45);
            $table->string('kd_regu',45);
            $table->string('status',45);
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
        Schema::dropIfExists('tb_karyawan');
    }
}
