<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seksi extends Model
{
    protected $table = 'tb_seksi';
    public $timestamp = false;
    public $incrementing = false;

    public function getBagian()
    {
        return $this->belongsTo('App\Bagian', 'kd_bagian', 'kd_bagian');
    }

    public function getRegu()
    {
        return $this->hasMany('App\Regu', 'kd_seksi', 'kd_seksi');
    }
}
