<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    protected $table = 'tb_sp';
    public $incrementing = false;

    public function getKontrakBA()
    {
        return $this->hasMany('App\KontrakBA', 'kd_sp', 'kd_sp');
    }

    public function getRkapDetail()
    {
        return $this->belongsTo('App\RkapDetail', 'kd_aktifitas_rkap', 'kd_aktifitas_rkap');
    }

    public function getKontrakFile()
    {
        return $this->hasMany('App\KontrakFile', 'kd_sp', 'kd_sp');
    }
}
