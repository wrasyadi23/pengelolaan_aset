<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kompartemen extends Model
{
    protected $table = 'tb_kompartemen';
    public $incrementing = false;
    public $timestamps = false;

    public function getAset()
    {
        return $this->belongsTo('App\Aset', 'kd_kompartemen', 'kd_kompartemen');
    }

    public function getDirektorat()
    {
        return $this->belongsTo('App\Direktorat', 'kd_direktorat', 'kd_direktorat');
    }

    public function getKompartemenHistory()
    {
        return $this->hasMany('App\KompartemenHistory', 'kd_kompartemen', 'kd_kompartemen');
    }

    public function getDepartemen()
    {
        return $this->hasMany('App\Departemen', 'kd_kompartemen', 'kd_kompartemen');
    }

    public function getKaryawan()
    {
        return $this->belongsTo('App\Karyawan', 'kd_kompartemen', 'kd_kompartemen');
    }
}
