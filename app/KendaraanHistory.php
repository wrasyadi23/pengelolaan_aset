<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KendaraanHistory extends Model
{
    protected $table = 'r_kendaraan_history';
    public $incrementing = false;

    public function getKendaraan()
    {
        return $this->belongsTo('App\Kendaraan', 'kd_kendaraan', 'kd_kendaraan');
    }
}
