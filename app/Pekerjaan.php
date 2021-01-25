<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = 'tb_pekerjaan';
    protected $guarded = [];
    public $incrementing = 'false';

    public function getKlasifikasi()
    {
        return $this->belongsTo('App\PekerjaanKlasifikasi', 'kd_klasifikasi_pekerjaan', 'kd_klasifikasi_pekerjaan');
    }

    public function getAreaklasifikasi()
    {
        return $this->hasOne('App\AreaKlasifikasi', 'kd_area', 'kd_area');
    }

    public function getAreaAlamat()
    {
        return $this->hasOne('App\AreaAlamat', 'kd_alamat', 'kd_alamat');
    }

    public function getAreaKeterangan()
    {
        return $this->hasOne('App\AreaKeterangan', 'kd_keterangan', 'kd_keterangan');
    }

    public function getFile()
    {
        return $this->hasMany('App\PekerjaanFile', 'booknumber', 'booknumber'); // Relasi foto menjadi hasMany karena 1 booknumber bisa memliki beberapa foto
    }

    public function getSR()
    {
        return $this->belongsTo('App\SR', 'kd_sr', 'kd_sr');
    }

    public function getPenilaian()
    {
        return $this->hasOne('App\Penilaian', 'kd_pekerjaan', 'booknumber');
    }

    public function getPekerjaanVerifikasi()
    {
        return $this->hasMany('App\PekerjaanVerifikasi', 'booknumber', 'booknumber');
    }

    public function getNotificationBadgeAttribute()
    {
        switch ($this->status) {
            case 'Requested':
                return "<span class='badge badge-primary'>$this->status</span>";
                break;
            case 'Approved':
            case 'In Progress':
            case 'Closed':
                return "<span class='badge badge-success'>$this->status</span>";
                break;
            case 'Done':
            case 'Revisi':
                return "<span class='badge badge-warning'>$this->status</span>";
                break;
            case 'Canceled':
                return "<span class='btn-danger'>$this->status</span>";
                break;
            default:
                return "<span class='btn-info'>$this->status</span>";
                break;
        }    }
}
