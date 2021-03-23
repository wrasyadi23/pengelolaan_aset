<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WumPtk extends Model
{
    protected $table = 'tb_wum_ptk';
    public $incrementing = false;
    public $timestamps = false;

    public function getPtk()
    {
        return $this->belongsTo('App\Ptk', 'kd_ptk', 'kd_ptk');
    }
}
