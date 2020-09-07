<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

class CreateParkirtolDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkirtol_detail', function (Blueprint $table) {
            $table->id();
            $table->string('kd_parkirtol', 45);
            $table->decimal('nilai_karcis', 10, 0);
            $table->decimal('jml_karcis', 10, 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parkirtol_detail');
    }
}
