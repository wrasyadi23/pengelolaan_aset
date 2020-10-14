<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SRSewaPivot extends Model
{
    protected $table = 'r_sr_sewa_pivot';
    public $incrementing = false;
    public $timestamps = false;

    public function getKendaraan()
    {
        return $this->hasOne('App\Kendaraan', 'kd_kendaraan', 'kd_kendaraan');
    }

    public function getTarif()
    {
        return $this->hasOne(TarifSewaEsd::class, 'kd_tarif', 'kd_tarif');
    }

    public function getSR()
    {
        return $this->hasMany('App\SR', 'kd_sr', 'kd_sr');
    }

    public function PivotKendaraan()
    {
        return Kendaraan::where('kd_kendaraan', $this->getKendataan->kd_kendaraan)->pluck('kd_kendaraan');
    }
}
