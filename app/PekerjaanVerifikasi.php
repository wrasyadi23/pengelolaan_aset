<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PekerjaanVerifikasi extends Model
{
    protected $table = 'r_pekerjaan_verifikasi';
    public $incrementing = false;

    public function getPekerjaan()
    {
        return $this->belongsTo('App\Pekerjaan', 'booknumber', 'booknumber');
    }
}
