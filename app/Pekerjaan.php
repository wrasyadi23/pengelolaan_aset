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

    public function getAreaklasifikasi()
    {
        return $this->hasOne('App\AreaKlasifikasi', 'kd_area', 'kd_area');
    }

    public function getAreaAlamat()
    {
        return $this->hasOne('App\AreaAlamat', 'kd_alamat', 'kd_alamat');
    }

    public function getAreaKeterangan()
    {
        return $this->hasOne('App\AreaKeterangan', 'kd_keterangan', 'kd_keterangan');
    }
}
