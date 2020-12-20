<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    protected $table = 'tb_aset';
    public $incrementing = false;

    public function getAsetFile()
    {
        return $this->hasMany('App\AsetFile', 'kd_aset', 'kd_aset');
    }

    public function getAsetHistory()
    {
        return $this->hasMany('App\AsetHistory', 'kd_aset', 'kd_aset');
    }

    public function getDirektorat()
    {
        return $this->hasOne('App\Direktorat', 'kd_direktorat', 'kd_direktorat');
    }

    public function getKompartemen()
    {
        return $this->hasOne('App\Kompartemen', 'kd_kompartemen', 'kd_kompartemen');
    }

    public function getDepartemen()
    {
        return $this->hasOne('App\Departemen', 'kd_departemen', 'kd_departemen');
    }

    public function getBagian()
    {
        return $this->hasOne('App\Bagian', 'kd_bagian', 'kd_bagian');
    }

    public function getSeksi()
    {
        return $this->hasOne('App\Seksi', 'kd_seksi', 'kd_seksi');
    }

    public function getRegu()
    {
        return $this->hasOne('App\Regu', 'kd_regu', 'kd_regu');
    }

    public function getAreaAlamat()
    {
        return $this->hasOne('App\AreaAlamat', 'kd_alamat', 'kd_alamat');
    }

    public function getAreaKeterangan()
    {
        return $this->hasOne('App\AreaKeterangan', 'kd_keterangan', 'kd_keterangan');
    }
}
