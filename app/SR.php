<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SR extends Model
{
    protected $table = 'tb_sr';
    public $incrementing = false;

    public function getKendaraan()
    {
        return $this->hasMany('App\Kendaraan', 'kd_ba', 'kd_ba');
    }

    public function getKontrakBA()
    {
        return $this->hasOne('App\KontrakBA', 'kd_ba', 'kd_ba');
    }

    public function getPR()
    {
        return $this->hasMany('App\PR', 'kd_sr', 'kd_sr');
    }
}
