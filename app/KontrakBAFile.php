<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KontrakBAFile extends Model
{
    protected $table = 'r_ba_file';
    public $incrementing = false;
    public $timestamps = false;

    public function getKontrakBA()
    {
        return $this->belongsTo('App\KontrakBA', 'kd_ba', 'kd_ba');
    }
}
