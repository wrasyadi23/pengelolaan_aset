<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealisasiUmDet extends Model
{
    protected $table = 'tb_realisasi_um_det';
    public $incrementing = false;
    public $timestamps = false;

    public function getRealisasiUm()
    {
        return $this->belongsTo('App\RealisasiUm', 'kd_real_um', 'kd_real_um');
    }

    public function getWUM()
    {
        return $this->belongsTo('App\WUM', 'kd_wum', 'kd_wum');
    }

    public function getUangmuka()
    {
        return $this->belongsTo('App\Uangmuka', 'kd_uangmuka', 'kd_uangmuka');
    }
    
}
