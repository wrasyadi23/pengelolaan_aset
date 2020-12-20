<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsetFile extends Model
{
    protected $table = 'r_aset_file';
    public $incrementing = false;
    public $timestamps = false;

    public function getAset()
    {
        return $this->belongsTo('App\Aset', 'kd_aset', 'kd_aset');
    }

}
