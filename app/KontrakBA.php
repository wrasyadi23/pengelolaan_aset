<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KontrakBA extends Model
{
    protected $table= 'tb_ba';
    public $incrementing = false;
    public $timestamps = false;

    public function getKontrak()
    {
        return $this->belongsTo('App\Kontrak', 'kd_sp', 'kd_sp');
    }

    public function getKendaraan()
    {
        return $this->hasMany('App\Kendaraan', 'kd_ba', 'kd_ba');
    }

    public function getSR()
    {
        return $this->belongsTo('App\SR', 'kd_ba', 'kd_ba');
    }

    public function getHargaSewa()
    {
        return $this->hasMany('App\HargaSewa', 'kd_ba', 'kd_ba');
    }

    public function getKontrakBAFile()
    {
        return $this->hasMany('App\KontrakBAFile', 'kd_ba', 'kd_ba');
    }
}
