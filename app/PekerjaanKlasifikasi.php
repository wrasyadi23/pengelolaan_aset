<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PekerjaanKlasifikasi extends Model
{
    protected $table = 'tb_pekerjaan_klasifikasi';
    public $timestamp = false;
    public $incrementing = false;

    public function getPekerjaan()
    {
        return $this->hasMany('App\Pekerjaan', 'kd_klasifikasi_pekerjaan', 'kd_klasifikasi_pekerjaan');
    }

    public function getRegu()
    {
        return $this->belongsTo('App\Regu', 'kd_regu', 'kd_regu');
    }
}
