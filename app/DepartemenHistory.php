<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartemenHistory extends Model
{
    protected $table = 'r_departemen_history';
    public $incrementing = false;
    public $timestamps = false;

    public function getDepartemen()
    {
        return $this->belongsTo('App\Departemen', 'kd_departemen', 'kd_departemen');
    }
}
