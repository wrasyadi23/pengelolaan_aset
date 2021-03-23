<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WUM extends Model
{
    protected $table = 'tb_wum';
    public $incrementing = false;
    public $timestamps = false;

    public function getUangmuka()
    {
        return $this->belongsTo('App\Uangmuka', 'kd_uangmuka', 'kd_uangmuka');
    }

    public function getRealisasiUm()
    {
        return $this->hasOne('App\RealisasiUm', 'kd_wum', 'kd_wum');
    }
    public function  getRealisasiUmDet()
    {
        return $this->hasMany('App\RealisasiUmDet', 'kd_real_um', 'kd_real_um');
    }
}
