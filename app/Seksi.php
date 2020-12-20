<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seksi extends Model
{
    protected $table = 'tb_seksi';
    public $timestamps = false;
    public $incrementing = false;

    public function getBagian()
    {
        return $this->belongsTo('App\Bagian', 'kd_bagian', 'kd_bagian');
    }

    public function getRegu()
    {
        return $this->hasMany('App\Regu', 'kd_seksi', 'kd_seksi');
    }

    public function getKaryawan()
    {
        return $this->belongsTo('App\Karyawan', 'nik', 'nik');
    }

    public function getAset()
    {
        return $this->belongsTo('App\Aset', 'kd_seksi', 'kd_seksi');
    }

    public function getSeksiHistory()
    {
        return $this->hasMany('App\SeksiHistory', 'kd_seksi', 'kd_seksi');
    }
}
