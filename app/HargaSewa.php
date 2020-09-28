<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HargaSewa extends Model
{
    protected $table = 'tb_kendaraan_harga_sewa';
    public $incrementing = false;
    public $timestamps = false;

    public function getKontrakBA()
    {
        return $this->belongsTo('App\KontrakBA', 'kd_ba', 'kd_ba');
    }

    public function getKendaraan()
    {
        return $this->hasMany('App\Kendaraan', 'kd_ba', 'kd_ba');
    }
}
