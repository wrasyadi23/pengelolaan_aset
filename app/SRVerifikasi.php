<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SRVerifikasi extends Model
{
    protected $table = 'tb_sr_verifikasi';
    public $incrementing = false;

    public function getSR()
    {
        return $this->belongsTo('App\SR', 'kd_sr', 'kd_sr');
    }
}
