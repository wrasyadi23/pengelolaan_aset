<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OK extends Model
{
    protected $table = 'tb_ok';
    public $incrementing = false;
    public $timestamps = false;

    public function getPR()
    {
        return $this->belongsTo('App\PR', 'kd_pr', 'kd_pr');
    }

    public function getRiksama()
    {
        return $this->belongsTo('App\Riksama', 'kd_ok', 'kd_ok');
    }
}
