<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BagianHistory extends Model
{
    public function getBagian()
    {
        return $this->belongsTo('App\Bagian', 'kd_bagian', 'kd_bagian');
    }
}
