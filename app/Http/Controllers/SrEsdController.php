<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SR;
use App\SRVerifikasi;
use App\SRSewaPivot;
use App\Kontrak;
use App\KontrakBA;
use App\HargaSewa;
use App\Srfull;
use App\Kendaraan;
use PDF;
use Carbon\Carbon;

class SrEsdController extends Controller
{
    public function create(){
        $rawDataBA = KontrakBA::orderBy('id', 'desc')->get();
        return view('transport/sr-esd-create', [
            'rawDataBA' => $rawDataBA
            ]);
    }

    public function store(Request $request)
    {
        $data = SR::select('id', 'no_sr', 'tgl')
            ->whereYear('tgl', date('Y'))
            ->orderBy('id', 'desc')->count();
        $tahun_sekarang = date('Ym');
        if ($data > 0) {
            $kd_sr = 'SR' . $tahun_sekarang . sprintf('%05s', $data + 1);
        } else {
            $kd_sr = 'SR' . $tahun_sekarang . sprintf('%05s', 1);
        }

        $tgl = $request->tgl;
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        $kd_ba = $request->kd_ba;
        $jenis_kend = $request->jenis_kend;
        $merk = $request->merk;
        $tarif = $request->tarif;

        $getTarif = HargaSewa::where(
            ['kd_ba', $kd_ba],
            ['jenis_kend', $jenis_kend],
            ['merk', $merk],
            ['klasifikasi_tarif', $tarif]
        )->first();
        
        $newSR = new SR;
        $newSR->kd_sr = $kd_sr;
        $newSR->no_sr = '-';
        $newSR->tgl = $tgl;
        $newSR->tgl_awal = $tgl_awal;
        $newSR->tgl_akhir = $tgl_akhir;
        $newSR->status = 'Request';
        $newSR->kd_ba = $kd_ba;
        $newSR->save();
                
        return redirect('transport/sr-esd-nopol/'.$kd_sr.'/'.$getTarif->kd_tarif);
    }

    // public function index_store_nopol()
    // {
    //     $
    // }

    public function store_nopol($kd_sr, $kd_tarif, Request $request)
    {
        $data = Kendaraan::select('id', 'kd_kendaraan')
            ->orderBy('id', 'desc')->count();
        if ($data > 0) {
            $kd_kendaraan = 'KEND' .  sprintf('%04s', $data + 1);
        } else {
            $kd_kendaraan = 'KEND' .  sprintf('%04s', 1);
        }
        
        $nopol = $request->nopol;
        $tahun = $request->tahun;

        $rawDataSR = SR::where('kd_sr',$kd_sr)->first();

        $newSewaPivot = new SRSewaPivot;
        $newSewaPivot->kd_sr = $kd_sr;
        $newSewaPivot->kd_kendaraan = $kd_kendaraan;
        $newSewaPivot->kd_tarif = $kd_tarif;
        $newSewaPivot->save();

        $newKendaraan = new Kendaraan;
        $newKendaraan->nopol = $nopol;
        $newKendaraan->merk = $rawDataSR->merk;
        $newKendaraan->type = $rawDataSR->type;
        $newKendaraan->jenis_kend = $rawDataSR->jenis_kend;
        $newKendaraan->tahun = $tahun;
        $newKendaraan->jenis_sewa = 'ESD';
        $newKendaraan->save();

        $rawDataKendaraan = Kendaraan::where('kd_kendaraan', $getKendaraan->pivot_kendaraan)->get();

        return view('transport/sr-esd-nopol/'.$kd_sr.'/'.$kd_tarif, compact('rawDataKendaraan'))->with('message', 'Data berhasil disimpan.');

    }
    
}
