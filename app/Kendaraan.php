<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'tb_kendaraan';
    public $incrementing = false;

    public function getKontrakBA()
    {
        return $this->hasMany('App\KontrakBA', 'kd_ba', 'kd_ba');
    }
    public function getSR()
    {
        return $this->belongsTo('App\SR', 'kd_ba', 'kd_ba');
    }

    public function getKendaraanHistory()
    {
        return $this->hasMany('App\KendaraanHistory', 'kd_kendaraan', 'kd_kendaraan');
    }

    public function getSRSewaPivot()
    {
        return $this->belongsTo('App\SRSewaPivot', 'kd_kendaraan', 'kd_kendaraan');
    }
}
