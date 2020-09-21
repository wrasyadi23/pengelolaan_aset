<?php

namespace App\Http\Controllers\Api;

use App\AreaAlamat;
use App\AreaKeterangan;
use App\Seksi;
use App\Regu;
use App\Kontrak;
use App\KontrakBA;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetResponse extends Controller
{
    public function getAlamat(Request $request)
    {
        $kd_area = $request->input('kd_area');
        $response = AreaAlamat::where('kd_area', $kd_area)->get()->toJson();
        return $response;
    }

    public function getKeterangan(Request $request)
    {
        $kd_alamat = $request->input('kd_alamat');
        $response = AreaKeterangan::where('kd_alamat', $kd_alamat)->get()->toJson();
        return $response;
    }

    public function getSeksi(Request $request)
    {
        $kd_bagian = $request->input('kd_bagian');
        $response = Seksi::where('kd_bagian', $kd_bagian)->get()->toJson();
        return $response;
    }

    public function getRegu(Request $request)
    {
        $kd_seksi = $request->input('kd_seksi');
        $response = Regu::where('kd_seksi',$kd_seksi)->get()->toJson();
        return $response;
    }

    public function getTarif(Request $request)
    {
        $kd_sp = $request->input('kd_sp');
        $response = HargaSewaEsd::where('kd_sp',$kd_sp)->get()->toJson();
        return $response;
    }
}
