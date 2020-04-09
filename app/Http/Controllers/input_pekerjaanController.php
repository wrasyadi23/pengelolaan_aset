<?php

namespace App\Http\Controllers;

use App\AreaKlasifikasi;
use App\PekerjaanKlasifikasi;
use App\Pekerjaan;
use Illuminate\Http\Request;

class input_pekerjaanController extends Controller
{
    public function index() {
        return view('pemeliharaan.pekerjaan');
    }

    public function create() {
        $area_klasifikasi = AreaKlasifikasi::all();
        $pekerjaan_klasifikasi = PekerjaanKlasifikasi::all();
        return view('pemeliharaan.pekerjaan-create', [
            'area_klasifikasi' => $area_klasifikasi,
            'pekerjaan_klasifikasi' => $pekerjaan_klasifikasi
        ]);
    }

    public function store(Request $request) {
        // input form 
        $nama = $request->input('nama');
        $nik = $request->input('nik');
        $kd_klasifikasi_pekerjaan = $request->input('kd_klasifikasi_pekerjaan');
        $tanggal_pekerjaan = date('Y-m-d');
        $uraian = $request->input('uraian');
        $file = $request->file('file');
    }
}
