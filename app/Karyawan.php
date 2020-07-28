<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'tb_karyawan';
    public $incrementing = false;

    public function getUser()
    {
        return $this->belongsTo('App\User', 'nik', 'nik');
    }

    public function getDepartemen()
    {
        return $this->hasOne('App\Departemen', 'kd_departemen', 'kd_departemen');
    }

    public function getBagian()
    {
        return $this->hasOne('App\Bagian', 'kd_bagian', 'kd_bagian');
    }

    public function getSeksi()
    {
        return $this->hasOne('App\Seksi', 'kd_seksi', 'kd_seksi');
    }

    public function getRegu()
    {
        return $this->hasOne('App\Regu', 'kd_regu', 'kd_regu');
    }

    public function getPekerjaan()
    {
        return $this->hasMany('App\Pekerjaan', 'nik', 'nik');
    }

    public function getUangmuka()
    {
        return $this->hasMany('App\uangmuka', 'nik', 'nik');
    }
}
