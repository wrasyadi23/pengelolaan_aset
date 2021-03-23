<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ptk extends Model
{
    protected $table = 'tb_ptk';
    public $incrementing = false;

    public function getKaryawan()
    {
        return $this->belongsTo('App\Karyawan', 'nik', 'nik');
    }

    public function getRkapDetail()
    {
        return $this->belongsTo('App\RkapDetail', 'kd_aktifitas_rkap', 'kd_aktifitas_rkap');
    }
    public function  getRealisasiUmDet()
    {
        return $this->hasMany('App\RealisasiUmDet', 'kd_ptk', 'kd_real_um');
    }
}
