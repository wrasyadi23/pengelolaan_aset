<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AreaKlasifikasi;
use App\AreaAlamat;
use Auth;

class AreaAlamatController extends Controller
{
    public function index($kd_area)
    {
        $klasifikasi = AreaKlasifikasi::where('kd_area', $kd_area)->first();
        return view('pemeliharaan/area-alamat', [
            'klasifikasi' => $klasifikasi,
        ]);
    }

    public function store($kd_area, request $request)
    {
        $kd_alamat = 'AL' . sprintf('%04s', AreaAlamat::all()->count() + 1);
        $alamat = new AreaAlamat;
        $alamat->kd_alamat = $kd_alamat;
        $alamat->alamat = $request->alamat;
        $alamat->kd_area = $kd_area;
        $alamat->save();
        return back()->with('success','Data berhasil disimpan.');
    }

    public function update($kd_alamat)
    {
        AreaAlamat::where('kd_alamat', $kd_alamat)->update([
            'alamat' => $request->area_alamat,
        ]);
        return back()->with('success','Data berhasil disimpan.');
    }

    public function delete($kd_alamat)
    {
        AreaAlamat::where('kd_alamat', $kd_alamat)->delete();
        return back()->with('delete','Data berhasil dihapus.');
    }
}
