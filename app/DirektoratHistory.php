<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DirektoratHistory extends Model
{
    protected $table = 'r_direktorat_history';
    public $incrementing = false;
    public $timestamps = false;

    public function getDirektorat()
    {
        return $this->belongsTo('App\Direktorat', 'kd_direktorat', 'kd_direktorat');
    }
}
