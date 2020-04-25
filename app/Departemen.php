<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table = 'tb_departemen';
    public $timestamp = false;
    public $incrementing = false;

    public function getBagian()
    {
        return $this->hasMany('App\Bagian', 'kd_departemen', 'kd_departemen');
    }
}
