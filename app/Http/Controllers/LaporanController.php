<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pekerjaan;
use App\PekerjaanKlasifikasi;
use App\Karyawan;
use Auth;

class LaporanController extends Controller
{
    public function index()
    {
        $pekerjaan = Pekerjaan::all();
        return view('/pemeliharaan/laporan', ['pekerjaan' => $pekerjaan]);
    }
    public function search(Request $request)
    {   
        $awal = $request->input('awal');
        $akhir = $request->input('akhir');
        if (Auth::user()->role == 'Admin') {
            $pekerjaan = Pekerjaan::where('tanggal_pekerjaan','>=',$awal)
            ->where('tanggal_pekerjaan','<=',$akhir)->get();
        } elseif (Auth::user()->role == 'Worker') {
            $klasifikasi = PekerjaanKlasifikasi::where('kd_klasifikasi', Auth::user()->getKaryawan->getRegu->getKlasifikasi->kd_klasifikasi)->get();
            $pekerjaan = Pekerjaan::where('tanggal_pekerjaan','>=',$awal)
            ->where('tanggal_pekerjaan','<=',$akhir)
            ->where('kd_klasifikasi',$klasifikasi)->get();
        }
        return view('/pemeliharaan/laporan', [
            'pekerjaan' => $pekerjaan,
            'awal' => $awal,
            'akhir' => $akhir,
        ]);
    }
}
