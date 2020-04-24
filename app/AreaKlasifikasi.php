<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaKlasifikasi extends Model
{
    protected $table = 'area_klasifikasi';
    public $timestamps = false;
    public $incrementing = false;

    public function getAreaAlamat()
    {
        return $this->belongsTo('App\AreaAlamat', 'kd_area', 'kd_area');
    }
}
