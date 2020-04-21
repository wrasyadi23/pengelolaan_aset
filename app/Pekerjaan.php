<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = 'tb_pekerjaan';
    public $incrementing = 'false';

    public function getKlasifikasi()
    {
        return $this->belongsTo('App\PekerjaanKlasifikasi', 'kd_klasifikasi_pekerjaan', 'kd_klasifikasi_pekerjaan');
    }
}
