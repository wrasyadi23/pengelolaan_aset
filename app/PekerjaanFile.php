<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PekerjaanFile extends Model
{
    protected $table = 'tb_pekerjaan_file';
    public $timestamps = false;
    public $incrementing = false;

    public function getPekerjaan()
    {
        return $this->belongsTo('App\Pekerjaan', 'booknumber', 'booknumber');
    }
}
