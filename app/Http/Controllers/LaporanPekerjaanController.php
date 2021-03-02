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
    public function index(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        $kd_seksi = $request->kd_seksi;
        $kd_regu = $request->kd_regu;

        $seksi = Seksi::where('kd_bagian', Auth::user()->getKaryawan->kd_bagian)->get();
        $pekerjaan = Pekerjaan::with('getKlasifikasi')
            ->when(isset($start) && isset($end), function ($query) use ($start, $end) {
                $query->whereBetween('tanggal_pekerjaan', [$start, $end]);
            })
            ->when(isset($kd_seksi), function ($query) use ($kd_seksi) {
                $regu = Regu::where('kd_seksi', $kd_seksi)->get()->pluck('kd_regu');
                $query->whereIn('kd_klasifikasi_pekerjaan', PekerjaanKlasifikasi::whereIn('kd_regu', $regu)->get()->pluck('kd_klasifikasi_pekerjaan'));
            })
            ->when(isset($kd_regu), function ($query) use ($kd_regu) {
                $query->whereIn('kd_klasifikasi_pekerjaan', PekerjaanKlasifikasi::where('kd_regu', $kd_regu)->get()->pluck('kd_klasifikasi_pekerjaan'));
            })->get()->groupBy('getKlasifikasi.kd_klasifikasi_pekerjaan');

        if ($request->input('show-mode') == 'pdf') {
            $pdf = PDF::loadView('/pemeliharaan/laporan-preview', [
                'pekerjaan' => $pekerjaan
            ])->setPaper('a4', 'landscape');

            return $pdf->stream();

        } else {
            return view('/pemeliharaan/laporan', [
                'seksi' => $seksi,
                'pekerjaan' => $pekerjaan,
            ]);
        }
    }

}
