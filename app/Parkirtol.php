<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parkirtol extends Model
{
    protected $table = 'parkirtol';
    protected $guarded = [];
    public $incrementing = false;

    public function getParkirtolDetail()
    {
        return $this->hasMany('App\ParkirtolDetail', 'kd_parkirtol', 'kd_parkirtol');
    }

    public function getRkapDetail()
    {
        return $this->belongsTo('App\RkapDetail', 'kd_aktifitas_rkap', 'kd_aktifitas_rkap');
    }
}
