<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AreaAlamat;
use App\AreaKeterangan;
use Auth;

class AreaKeteranganController extends Controller
{
    public function index($kd_alamat)
    {
        $alamat = AreaAlamat::where('kd_alamat', $kd_alamat)->first();
        return view('pemeliharaan/area-keterangan', [
            'alamat' => $alamat,
        ]);
    }

    public function store($kd_alamat, request $request)
    {
        $kd_keterangan = 'AN' . sprintf('%04s', AreaKeterangan::all()->count() + 1);
        $keterangan = new AreaKeterangan;
        $keterangan->kd_keterangan = $kd_keterangan; 
        $keterangan->keterangan = $keterangan; 
        $keterangan->kd_alamat = $kd_alamat; 
        $keterangan->save();
        return back()->with('success','Data berhasil disimpan.'); 
    }

    public function update($kd_keterangan, request $request)
    {
        AreaKeterangan::where('kd_keterangan', $kd_keterangan)->update([
            'keterangan' => $request->area_keterangan,
        ]);
        return back()->with('success','Data berhasil disimpan.');
    }

    public function delete($kd_keterangan)
    {
        AreaKeterangan::where('kd_keterangan', $kd_keterangan)->delete();
        return back()->with('delete','Data berhasil dihapus.');
    }
}
