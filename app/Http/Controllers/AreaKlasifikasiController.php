<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AreaKlasifikasi;
use Auth;
use MongoDB\Driver\Session;

class AreaKlasifikasiController extends Controller
{
    public function index()
    {
        $klasifikasi = AreaKlasifikasi::all();
        return view('pemeliharaan/area-klasifikasi', [
            'klasifikasi' => $klasifikasi,
        ]);
    }

    public function store(Request $request)
    {
        $kd_area = 'AR' . sprintf('%04s', AreaKlasifikasi::all()->count() + 1);
        $klasifikasi = new AreaKlasifikasi();
        $klasifikasi->kd_area = $kd_area;
        $klasifikasi->klasifikasi_area = $request->klasifikasi_area;
        $klasifikasi->save();
        return back()->with('message-success', 'Data berhasil disimpan.');
    }

    public function update($kd_area, Request $request)
    {
        AreaKlasifikasi::where('kd_area', $kd_area)->update([
            'klasifikasi_area' => $request->klasifikasi_area
        ]);
        return back()->with('message-success', 'Data berhasil disimpan.');
    }

    public function delete($kd_area)
    {
        AreaKlasifikasi::where('kd_area', $kd_area)->delete();
        return back()->with('delete','Data berhasil dihapus.');
    }
}
