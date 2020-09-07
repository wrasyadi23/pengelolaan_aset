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

    public function getPengemudi()
    {
        return $this->hasOne('App\Pengemudi', 'kd_pengemudi', 'kd_pengemudi');
    }

    public function getUangmuka()
    {
        return $this->belongsTo('App\Uangmuka', 'kd_uangmuka', 'kd_uangmuka');
    }

}
