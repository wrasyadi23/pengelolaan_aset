<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uangmuka extends Model
{
    protected $table = 'uangmuka';
    public $incrementing = false;

    public function getKaryawan()
    {
        return $this->belongsTo('App\Karyawan', 'nik', 'nik');
    }

    public function getRkapDetail()
    {
        return $this->belongsTo('App\RkapDetail', 'kd_aktifitas_rkap', 'kd_aktifitas_rkap');
    }

    public function getParkirtol()
    {
        return $this->hasMany('App\Parkirtol', 'kd_uangmuka', 'kd_uangmuka');
    }
}
