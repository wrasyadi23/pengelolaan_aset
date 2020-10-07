<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SRSewaPivot extends Model
{
    protected $table = 'r_sr_sewa_pivot';
    public $incrementing = false;

    public function getKendaraan()
    {
        return $this->hasMany('App\Kendaraan', 'kd_kendaraan', 'kd_kendaraan');
    }

    public function getSR()
    {
        return $this->hasMany('App\SR', 'kd_sr', 'kd_sr');
    }

    public function PivotKendaraan()
    {
        return Kendaraan::where('kd_kendaraan', $this->getKendataan->kd_kendaraan)->pluck('kd_kendaraan')
    }
}
