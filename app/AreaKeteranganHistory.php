<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaKeteranganHistory extends Model
{
    protected $table = 'r_area_keterangan_history';
    public $incrementing = false;
    public $timestamps = false;

    public function getAreaKeterangan()
    {
        return $this->belongsTo('App\AreaKeterangan', 'kd_keterangan', 'kd_keterangan');
    }
}
