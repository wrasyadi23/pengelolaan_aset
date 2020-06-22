<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pekerjaan;
use App\PekerjaanKlasifikasi;
use App\Karyawan;
use App\Seksi;
use PDF;
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
            $rawData = Seksi::with(['getRegu.getKlasifikasi.getPekerjaan' => function ($query) use ($awal, $akhir) {
                $query->whereBetween('tb_pekerjaan.tanggal_pekerjaan', [$awal, $akhir])->select('*');
            }])->get();

            $countPekerjaanRequested = Pekerjaan::whereBetween('tanggal_pekerjaan', [$awal, $akhir])->where('status', 'Requested')->count();
            $countPekerjaanApproved = Pekerjaan::whereBetween('tanggal_pekerjaan', [$awal, $akhir])->where('status', 'Approved')->count();
            $countPekerjaanProgress = Pekerjaan::whereBetween('tanggal_pekerjaan', [$awal, $akhir])->where('status', 'In Progress')->count();
            $countPekerjaanDone = Pekerjaan::whereBetween('tanggal_pekerjaan', [$awal, $akhir])->where('status', 'Done')->count();
            $countPekerjaanClosed = Pekerjaan::whereBetween('tanggal_pekerjaan', [$awal, $akhir])->where('status', 'Closed')->count();
            $countPekerjaanTotal = Pekerjaan::whereBetween('tanggal_pekerjaan', [$awal, $akhir])->count();

            foreach ($rawData as $indexSeksi => $itemSeksi) {
                $countKlasifikasi[$indexSeksi] = 0;
                foreach ($itemSeksi->getRegu as $indexRegu => $itemRegu) {
                    foreach ($itemRegu->getKlasifikasi as $indexKlasifikasi => $itemKlasifikasi) {
                        $countKlasifikasi[$indexSeksi]++;
                    }
                }
            }
        } elseif (Auth::user()->role == 'Worker') {
            $klasifikasi = PekerjaanKlasifikasi::where('kd_klasifikasi', Auth::user()->getKaryawan->getRegu->getKlasifikasi->kd_klasifikasi)->toArray();
            $rawData = Pekerjaan::where('tanggal_pekerjaan', '>=', $awal)
                ->where('tanggal_pekerjaan', '<=', $akhir)
                ->where('kd_klasifikasi', $klasifikasi)
                ->with('getKlasifikasi')->get()
                ->groupBy('getKlasifikasi.kd_klasifikasi_pekerjaan')
                ->all();
        } elseif (Auth::user()->role == 'User') {
            $rawData = Pekerjaan::where('tanggal_pekerjaan','>=', $awal)
            ->where('tanggal_pekerjaan','<=',$akhir)
            ->where('nik','=',Auth::user()->nik)
            ->with('getKlasifikasi')->get()
            ->groupBy('getKlasifikasi.kd_klasifikasi_pekerjaan')
            ->all();
        }
        return view('/pemeliharaan/laporan', [
                'no' => 1,
                'rawData' => $rawData,
                'countKlasifikasi' => $countKlasifikasi,
                'countPekerjaanRequested' => $countPekerjaanRequested,
                'countPekerjaanApproved' => $countPekerjaanApproved,
                'countPekerjaanProgress' => $countPekerjaanProgress,
                'countPekerjaanDone' => $countPekerjaanDone,
                'countPekerjaanClosed' => $countPekerjaanClosed,
                'countPekerjaanTotal' => $countPekerjaanTotal,
                'awal' => $awal,
                'akhir' => $akhir,
            ]);
    }

    public function preview($awal,$akhir)
    {
        if (Auth::user()->role == 'Admin') {
            $rawData = Seksi::with(['getRegu.getKlasifikasi.getPekerjaan' => function ($query) use ($awal, $akhir) {
                $query->whereBetween('tb_pekerjaan.tanggal_pekerjaan', [$awal, $akhir])->select('*');
            }])->get();

            $countPekerjaanRequested = Pekerjaan::whereBetween('tanggal_pekerjaan', [$awal, $akhir])->where('status', 'Requested')->count();
            $countPekerjaanApproved = Pekerjaan::whereBetween('tanggal_pekerjaan', [$awal, $akhir])->where('status', 'Approved')->count();
            $countPekerjaanProgress = Pekerjaan::whereBetween('tanggal_pekerjaan', [$awal, $akhir])->where('status', 'In Progress')->count();
            $countPekerjaanDone = Pekerjaan::whereBetween('tanggal_pekerjaan', [$awal, $akhir])->where('status', 'Done')->count();
            $countPekerjaanClosed = Pekerjaan::whereBetween('tanggal_pekerjaan', [$awal, $akhir])->where('status', 'Closed')->count();
            $countPekerjaanTotal = Pekerjaan::whereBetween('tanggal_pekerjaan', [$awal, $akhir])->count();

            foreach ($rawData as $indexSeksi => $itemSeksi) {
                $countKlasifikasi[$indexSeksi] = 0;
                foreach ($itemSeksi->getRegu as $indexRegu => $itemRegu) {
                    foreach ($itemRegu->getKlasifikasi as $indexKlasifikasi => $itemKlasifikasi) {
                        $countKlasifikasi[$indexSeksi]++;
                    }
                }
            }
        } elseif (Auth::user()->role == 'Worker') {
            $klasifikasi = PekerjaanKlasifikasi::where('kd_klasifikasi', Auth::user()->getKaryawan->getRegu->getKlasifikasi->kd_klasifikasi)->toArray();
            $rawData = Pekerjaan::where('tanggal_pekerjaan', '>=', $awal)
                ->where('tanggal_pekerjaan', '<=', $akhir)
                ->where('kd_klasifikasi', $klasifikasi)
                ->with('getKlasifikasi')->get()
                ->groupBy('getKlasifikasi.kd_klasifikasi_pekerjaan')
                ->all();
        } elseif (Auth::user()->role == 'User') {
            $rawData = Pekerjaan::where('tanggal_pekerjaan','>=', $awal)
            ->where('tanggal_pekerjaan','<=',$akhir)
            ->where('nik','=',Auth::user()->nik)
            ->with('getKlasifikasi')->get()
            ->groupBy('getKlasifikasi.kd_klasifikasi_pekerjaan')
            ->all();
        }

        $pdf =  PDF::loadView('/pemeliharaan/laporan-preview', [
                'no' => 1,
                'rawData' => $rawData,
                'countKlasifikasi' => $countKlasifikasi,
                'countPekerjaanRequested' => $countPekerjaanRequested,
                'countPekerjaanApproved' => $countPekerjaanApproved,
                'countPekerjaanProgress' => $countPekerjaanProgress,
                'countPekerjaanDone' => $countPekerjaanDone,
                'countPekerjaanClosed' => $countPekerjaanClosed,
                'countPekerjaanTotal' => $countPekerjaanTotal,
                'awal' => $awal,
                'akhir' => $akhir,
            ])->setPaper('a4','portrait');
        
        return $pdf->download('laporan-kegiatan.pdf');
    }
}
