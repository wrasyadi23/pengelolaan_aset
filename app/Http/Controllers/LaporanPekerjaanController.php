<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\PekerjaanFile;
use App\PekerjaanKlasifikasi;
use App\PekerjaanKapasitas;
use App\Pekerjaan;
use App\PekerjaanVerifikasi;
use App\Penilaian;
use App\Bagian;
use App\Seksi;
use App\Regu;
use PDF;
use Auth;

class LaporanPekerjaanController extends Controller
{
    public function index()
    {
        $seksi = Seksi::where('kd_bagian', Auth::user()->getKaryawan->kd_bagian)->get();
        $pekerjaan = Pekerjaan::all();
        return view('/pemeliharaan/laporan', [
            'seksi' => $seksi,
            'pekerjaan' => $pekerjaan,
        ]);
    }
}
