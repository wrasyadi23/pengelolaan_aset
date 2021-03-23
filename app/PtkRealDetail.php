<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PtkRealDetail extends Model
{
    protected $table = ' tb_realisasi_um_det';
    public $incrementing = false;
    public $timestamps = false;

    public function getPtk()
    {
        return $this->belongsTo('App\Ptk', 'kd_ptk', 'kd_real_um');
    }

    public function getWUM()
    {
        return $this->belongsTo('App\WUM', 'kd_wum', 'kd_wum');
    }

}
