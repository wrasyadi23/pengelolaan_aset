<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RkapDetail extends Model
{
    protected $table = 'tb_detail_rkap';
    public $incrementing = false;

    public function getRkap()
    {
        return $this->belongsTo('App\Rkap', 'kd_rkap', 'kd_rkap');
    }

    public function getKontrak()
    {
        return $this->hasMany('App\Kontrak', 'kd_aktifitas_rkap', 'kd_aktifitas_rkap');
    }
}
