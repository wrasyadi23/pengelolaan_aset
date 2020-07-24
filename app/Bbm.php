<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bbm extends Model
{
    protected $table = 'tb_bbm';
    public $incrementing = false;

    public function getRkapDetail()
    {
        return $this->belongsTo('App\RkapDetail', 'kd_aktifitas_rkap', 'kd_aktifitass_rkap');
    }

    public function getKendaraan()
    {
        return $this->hasOne('App\Kendaraan', 'kd_kendaraan', 'kd_kendaraan');
    }
}
