<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KontrakFile extends Model
{
    protected $table = 'r_sp_file';
    public $incrementing = false;
    public $timestamps = false;

    public function getKontrak()
    {
        return $this->belongsTo('App\Kontrak', 'kd_sp', 'kd_sp');
    }
}
