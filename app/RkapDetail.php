<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RkapDetail extends Model
{
    protected $table = 'tb_rkap_detail';
    public $incrementing = false;

    public function getRkap()
    {
        return $this->belongsTo('App\Rkap', 'kd_rkap', 'kd_rkap');
    }

    public function getKontrak()
    {
        return $this->hasMany('App\Kontrak', 'kd_aktifitas_rkap', 'kd_aktifitas_rkap');
    }

    public function getBbm()
    {
        return $this->hasOne('App\Bbm', 'kd_aktifitas_rkap', 'kd_aktifitas_rkap');
    }

    public function getUangmuka()
    {
        return $this->hasMany('App\Uangmuka', 'kd_aktifitas_rkap', 'kd_aktifitas_rkap');
    }

    public function getBagian()
    {
        return $this->hasOne('App\Bagian', 'kd_bagian', 'kd_bagian');
    }
}
