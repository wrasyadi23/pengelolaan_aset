<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaKeterangan extends Model
{
    protected $table = 'area_keterangan';
    public $timestamps = false;
    public $incrementing = false;

    public function getAreaAlamat()
    {
        return $this->belongsTo('App\AreaAlamat', 'kd_alamat', 'kd_alamat');
    }

    public function getPekerjaan()
    {
        return $this->belongsTo('App\Pekerjaan', 'kd_keterangan', 'kd_keterangan');
    }

    public function getAreaKeteranganHistory()
    {
        return $this->hasMany('App\AreaKeteranganHistory', 'kd_keterangan', 'kd_keterangan');
    }
}
