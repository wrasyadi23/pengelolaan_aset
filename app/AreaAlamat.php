<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaAlamat extends Model
{
    protected $table = 'area_alamat';
    public $timestamps = false;
    public $incrementing = false;

    public function getAreaKlasifikasi()
    {
        return $this->belongsTo('App\AreaKlasifikasi', 'kd_area', 'kd_area');
    }

    public function getAreaKeterangan()
    {
        return $this->hasMany('App\AreaKeterangan', 'kd_alamat', 'kd_alamat');
    }
}
