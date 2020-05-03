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
}
