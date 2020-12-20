<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsetHistory extends Model
{
    protected $table = 'r_aset_history';
    public $incrementing = false;

    public function getAset()
    {
        return $this->belongsTo('App\Aset', 'kd_aset', 'kd_aset');
    }
}
