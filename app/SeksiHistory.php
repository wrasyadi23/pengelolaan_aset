<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeksiHistory extends Model
{
    protected $table = 'r_seksi_history';
    public $incrementing = false;
    public $timestamps = false;

    public function getSeksi()
    {
        return $this->belongsTo('App\Seksi', 'kd_seksi', 'kd_seksi');
    }
}
