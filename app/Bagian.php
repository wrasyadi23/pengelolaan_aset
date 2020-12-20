<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    protected $table = 'tb_bagian';
    public $timestamps = false;
    public $incrementing = false;

    public function getDepartemen()
    {
        return $this->belongsTo('App\Departemen', 'kd_departemen', 'kd_departemen');
    }

    public function getSeksi()
    {
        return $this->hasMany('App\Seksi', 'kd_bagian', 'kd_bagian');
    }

    public function getKaryawan()
    {
        return $this->belongsTo('App\Karyawan', 'nik', 'nik');
    }

    public function getBagianHistory()
    {
        return $this->hasMany('App\Bagian', 'kd_bagian', 'kd_bagian');
    }

    public function getAset()
    {
        return $this->belongsTo('App\Aset', 'kd_bagian', 'kd_bagian');
    }
}
