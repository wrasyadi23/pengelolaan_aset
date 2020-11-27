<?php

namespace App\Http\Controllers\Api;

use App\AreaAlamat;
use App\AreaKeterangan;
use App\Bagian;
use App\Seksi;
use App\Regu;
use App\Kontrak;
use App\KontrakBA;
use App\HargaSewa;
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

    public function getBagian(Request $request)
    {
        $kd_departemen = $request->input('kd_departemen');
        $response = Bagian::where('kd_departemen', $kd_departemen)->get()->toJson();
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

    public function getJenisKend(Request $request)
    {
        $kd_ba = $request->input('kd_ba');
        $response = HargaSewa::select('jenis_kend')->where('kd_ba',$kd_ba)
            ->groupBy('jenis_kend')->get()->toJson();
        return $response;
    }

    public function getMerk(Request $request)
    {
        $jenis_kend = $request->input('jenis_kend');
        $response = HargaSewa::select('merk')->groupBy('merk')->where('jenis_kend',$jenis_kend)
            ->get()->toJson();
        return $response;
    }

    public function getTarif(Request $request)
    {
        $merk = $request->input('merk');
        $response = HargaSewa::where('merk',$merk)
            ->get()->toJson();
        return $response;
    }

}
