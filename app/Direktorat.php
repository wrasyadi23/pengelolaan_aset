<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direktorat extends Model
{
    protected $table = 'tb_direktorat';
    public $incrementing = false;
    public $timestamps = false;

    public function getAset()
    {
        return $this->belongsTo('App\Aset', 'kd_direktorat', 'kd_direktorat');
    }

    public function getKompartemen()
    {
        return $this->hasMany('App\Kompartemen', 'kd_direktorat', 'kd_direktorat');
    }

    public function getDirektoratHistory()
    {
        return $this->hasMany('App\DirektoratHistory', 'kd_direktorat', 'kd_direktorat');
    }
}
