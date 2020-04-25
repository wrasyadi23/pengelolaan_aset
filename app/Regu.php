<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regu extends Model
{
    protected $table = 'tb_regu';
    public $timestamp = false;
    public $incrementing = false;

    public function getSeksi()
    {
        return $this->belongsTo('App\Seksi', 'kd_seksi', 'kd_seksi');
    }
}
