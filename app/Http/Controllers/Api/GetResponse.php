<?php

namespace App\Http\Controllers\Api;

use App\AreaAlamat;
use App\AreaKeterangan;
use App\Seksi;
use App\Regu;
use App\Kontrak;
use App\KontrakBA;
use App\HargaSewaEsd;
use App\Rkap;
use App\RkapDetail;
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
        $response = HargaSewaEsd::select('kd_tarif')->where('kd_sp',$kd_sp)
            ->groupBy('kd_tarif')->get()->toJson();
        return $response;
    }

    public function getMerk(Request $request)
    {
        $kd_tarif = $request->input('kd_tarif');
        $response = HargaSewaEsd::select('merk')->where('kd_tarif',$kd_tarif)
            ->groupBy('merk')->get()->toJson();
        return $response;
    }

    public function getGLAccount(Request $request)
    {
        $cost_center = $request->input('cost_center');
        // $response = Rkap::with(['getRkapDetail' => function ($query) {
        //     return $query->select(['kd_rkap', 'nama_aktifitas'])->groupBy('nama_aktifitas');
        // }])->where('cost_center', $cost_center)->get()->toJson();

        $response = Rkap::where('cost_center', $cost_center)->get()->toJson();
        return $response;
    }

    public function getKodeAktifitasRkap(Request $request)
    {
        $kd_rkap = $request->input('gl_acc');
        $response = RkapDetail::where('kd_rkap', $kd_rkap)->get()->toJson();
        return $response;
    }
}
