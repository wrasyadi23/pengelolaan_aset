<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParkirtolDetail extends Model
{
    protected $table = 'parkirtol_detail';
    public $timestamps = false;
    public $incrementing = false;

    public function getParkirtol()
    {
        return $this->belongsTo('App\Parkirtol', 'kd_parkirtol', 'kd_parkirtol');
    }
}
