<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rkap extends Model
{
    protected $table = 'tb_rkap';
    public $incrementing = false;

    public function getRkapDetail()
    {
        return $this->hasMany('App\RkapDetail', 'kd_rkap', 'kd_rkap');
    }
}
