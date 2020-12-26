<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $table = 'tb_penilaian';
    public $incrementing = false;

    public function getPekerjaan()
    {
        return $this->belongsTo('App\Pekerjaan', 'booknumber', 'kd_pekerjaan');
    }
}
