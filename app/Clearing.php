<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clearing extends Model
{
    protected $table = 'tb_clearing';
    public $incrementing = false;
    public $timestamps = false;

    public function getWUM()
    {
        return $this->belongsTo('App\WUM', 'kd_wum', 'kd_wum');
    }

    public function getUangmuka()
    {
        return $this->belongsTo('App\Uangmuka', 'kd_uangmuka', 'kd_uangmuka');
    }
}
