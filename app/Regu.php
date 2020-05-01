<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regu extends Model
{
    protected $table = 'tb_regu';
    public $timestamps = false;
    public $incrementing = false;

    public function getSeksi()
    {
        return $this->belongsTo('App\Seksi', 'kd_seksi', 'kd_seksi');
    }

    public function getKlasifikasi()
    {
        return $this->hasMany('App\AreaKlasifikasi', 'kd_regu', 'kd_regu');
    }
}
