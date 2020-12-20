<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table = 'tb_departemen';
    public $timestamps = false;
    public $incrementing = false;

    public function getBagian()
    {
        return $this->hasMany('App\Bagian', 'kd_departemen', 'kd_departemen');
    }

    public function getKaryawan()
    {
        return $this->belongsTo('App\Karyawan', 'nik', 'nik');
    }

    public function getAset()
    {
        return $this->belongsTo('App\Aset', 'kd_departemen', 'kd_departemen');
    }

    public function getDepartemenHistory()
    {
        return $this->hasMany('App\DepartemenHistory', 'kd_departemen', 'kd_departemen');
    }
}
