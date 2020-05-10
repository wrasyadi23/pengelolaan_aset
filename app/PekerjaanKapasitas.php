<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PekerjaanKapasitas extends Model
{
    protected $table = 'tb_pekerjaan_kapasitas';
    public $timestamps = false;
    public $incrementing = false;

    public function getRegu()
    {
        return $this->belongsTo('App\Regu', 'kd_regu', 'kd_regu');
    }
}
