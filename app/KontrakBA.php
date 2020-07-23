<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KontrakBA extends Model
{
    protected $table= 'tb_ba';
    public $incrementing = false;
    public $timestamps = false;

    public function getKontrak()
    {
        return $this->belongsTo('App\Kontrak', 'kd_sp', 'kd_sp');
    }
}
