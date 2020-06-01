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
            $pekerjaan = Pekerjaan::where('tanggal_pekerjaan', '>=', $awal)
                ->where('tanggal_pekerjaan', '<=', $akhir)
                ->with('getKlasifikasi')->get() // get relation di query untuk keperluan grouping
                ->groupBy('getKlasifikasi.kd_klasifikasi_pekerjaan') // Untuk grouping array dengan index getKlasifikasi.kd_klasifikasi_pekerjaan
                ->all();
        } elseif (Auth::user()->role == 'Worker') {
            $klasifikasi = PekerjaanKlasifikasi::where('kd_klasifikasi', Auth::user()->getKaryawan->getRegu->getKlasifikasi->kd_klasifikasi)->toArray();
            $pekerjaan = Pekerjaan::where('tanggal_pekerjaan', '>=', $awal)
                ->where('tanggal_pekerjaan', '<=', $akhir)
                ->where('kd_klasifikasi', $klasifikasi)
                ->with('getKlasifikasi')->get()
                ->groupBy('getKlasifikasi.kd_klasifikasi_pekerjaan')
                ->all();
        }
        return
            // json_encode($pekerjaan) ;
            view('/pemeliharaan/laporan', [
                'no' => 1,
                'pekerjaan' => $pekerjaan,
                'awal' => $awal,
                'akhir' => $akhir,
            ]);
    }
}
