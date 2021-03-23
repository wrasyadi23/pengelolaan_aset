<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealisasiUm extends Model
{
    protected $table = 'tb_realisasi_um';
    public $incrementing = false;
    public $timestamps = false;

    public function getWUM()
    {
        return $this->belongsTo('App\WUM', 'kd_wum', 'kd_wum');
    }

    // public function getUangmuka()
    // {
    //     return $this->belongsTo('App\Uangmuka', 'kd_uangmuka', 'kd_uangmuka');
    // }

    public function getRealisasiUmDet()
    {
        return $this->hasMany('App\RealisasiUmDet', 'kd_real_um', 'kd_real_um');
    }
}
