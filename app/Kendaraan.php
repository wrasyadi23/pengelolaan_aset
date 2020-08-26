<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'tb_kendaraan';
    public $incrementing = false;

    public function getKontrakBA()
    {
        return $this->belongsTo('App\KontrakBA', 'kd_ba', 'kd_ba');
    }
    public function getSR()
    {
        return $this->belongsTo('App\SR', 'kd_ba', 'kd_ba');
    }
}