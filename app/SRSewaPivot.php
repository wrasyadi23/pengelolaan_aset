<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SRSewaPivot extends Model
{
    protected $table = 'r_sr_sewa_pivot';
    public $incrementing = false;

    public function getSR()
    {
        return $this->belongsTo('App\SR', 'kd_sr', 'kd_sr');
    }

    public function getKendaraan()
    {
        return $this->belongsTo('App\Kendaraan', 'kd_kendaraan', 'kd_kendaraan');
    }

    public function getHargaSewa()
    {
        return $this->belongsTo('App\HargaSewa', 'kd_tarif', 'kd_tarif');
    }
}
