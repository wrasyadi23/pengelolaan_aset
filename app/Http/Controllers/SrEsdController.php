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

        $tgl = $request->input('tgl');
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $kd_ba = $request->input('kd_ba');
        $jenis_kend = $request->input('jenis_kend');
        $merk = $request->input('merk');
        $tarif = $request->input('tarif');

        $getTarif = HargaSewa::where([
            ['kd_ba', $kd_ba],
            ['jenis_kend', $jenis_kend],
            ['merk', $merk],
            ['kd_tarif', $tarif]
        ])->first();

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

     public function index_store_nopol($kd_sr, $kd_tarif)
     {
         $getKendaraan = SRSewaPivot::where('kd_sr', $kd_sr)->get();

         return view('transport/sr-esd-nopol',[
             'kd_sr' => $kd_sr,
             'kd_tarif' => $kd_tarif,
             'getKendaraan' => $getKendaraan
         ]);
     }

    public function store_nopol($kd_sr, $kd_tarif, Request $request)
    {
        $data = Kendaraan::select('id', 'kd_kendaraan')
            ->orderBy('id', 'desc')->count();
        if ($data > 0) {
            $kd_kendaraan = 'KEND' .  sprintf('%04s', $data + 1);
        } else {
            $kd_kendaraan = 'KEND' .  sprintf('%04s', 1);
        }

        $nopol = $request->input('nopol');
        $tahun = $request->input('tahun');
        $warna = $request->input('warna');

        $rawDataSR = SR::where('kd_sr',$kd_sr)->first();

        $newSewaPivot = new SRSewaPivot;
        $newSewaPivot->kd_sr = $kd_sr;
        $newSewaPivot->kd_kendaraan = $kd_kendaraan;
        $newSewaPivot->kd_tarif = $kd_tarif;


        $newKendaraan = new Kendaraan;
        $newKendaraan->nopol = $nopol;
        $newKendaraan->kd_kendaraan = $kd_kendaraan;
        $newKendaraan->merk = $rawDataSR->getKontrakBA->getHargaSewa->first()->merk;
        $newKendaraan->type = $rawDataSR->getKontrakBA->getHargaSewa->first()->type;
        $newKendaraan->jenis_kend = $rawDataSR->getKontrakBA->getHargaSewa->first()->jenis_kend;
        $newKendaraan->tahun = $tahun;
        $newKendaraan->warna = $warna;
        $newKendaraan->jenis_sewa = 'SewaESD';
        $newKendaraan->save();
        $newSewaPivot->save();

        return redirect('transport/sr-esd-nopol/'.$kd_sr.'/'.$kd_tarif)->with('message', 'Data berhasil disimpan.');

    }

    public function tampilsresd(){
        $sresd = SRSewaPivot::orderBy('id', 'desc')
        ->get();
        return view('transport/sr-esd-tampil', ['sresd' => $sresd]);
    }

    public function edit($id)
    {
        $editsresd = SR::where('id', $id)->first();
        return view('transport/sr-esd-edit', ['editsresd' => $editsresd]);
    }
    public function update($id, Request $request)
    {
        $no_sr = $request->input('no_sr');
        $tgl = $request->input('tgl');
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $status = $request->input('status');
        
        $newRealisasi = SR::findOrFail($id);
        $newRealisasi->no_sr = $no_sr;
        $newRealisasi->tgl = $tgl;
        $newRealisasi->tgl_awal = $tgl_awal;
        $newRealisasi->tgl_akhir = $tgl_akhir;
        $newRealisasi->status = $status;
        $newRealisasi->save();
                
        return redirect('transport/sr-esd-tampil');
    }

}
