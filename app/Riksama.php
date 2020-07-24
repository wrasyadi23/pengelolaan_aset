<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riksama extends Model
{
    protected $table = 'tb_riksama';
    public $incrementing = false;

    public function getOK()
    {
        return $this->hasOne('App\OK', 'kd_ok', 'kd_ok');
    }
}
