<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KompartemenHistory extends Model
{
    protected $table = 'r_kompartemen_history';
    public $incrementing = false;
    public $timestamps = false;

    public function getKompartemen()
    {
        return $this->belongsTo('App\Kompartemen', 'kd_kompartemen', 'kd_kompartemen');
    }
}
