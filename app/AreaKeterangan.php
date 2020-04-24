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
}
