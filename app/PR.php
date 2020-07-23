<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PR extends Model
{
    protected $table = 'tb_sr';
    public $incrementing = false;
    public $timestamps = false;

    public function getSR()
    {
        return $this->belongsTo('App\SR', 'kd_sr', 'kd_sr');
    }

    public function getOK()
    {
        return $this->hasOne('App\OK', 'kd_pr', 'kd_pr');
    }
}
