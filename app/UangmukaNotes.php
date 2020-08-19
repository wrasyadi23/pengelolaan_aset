<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UangmukaNotes extends Model
{
    protected $table = 'uangmuka_notes';
    public $incrementing = 'false';
    public $timestamps = 'false';

    public function getUangmuka()
    {
        return $this->belongsTo('App\Uangmuka', 'kd_uangmuka', 'kd_uangmuka');
    }
}
