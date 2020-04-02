<?php

namespace App\Http\Controllers\Api;

use App\AreaAlamat;
use App\AreaKeterangan;
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
}
