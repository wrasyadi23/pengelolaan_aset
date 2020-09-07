<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengemudi extends Model
{
    protected $table = 'tb_pengemudi';
    public $incrementing = false;

    public function getParkirtol()
    {
        return $this->belongsTo('App\Parkirtol', 'kd_pengemudi', 'kd_pengemudi');
    }

}
