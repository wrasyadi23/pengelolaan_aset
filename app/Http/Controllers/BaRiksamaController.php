<?php

namespace App\Http\Controllers;
use App\OK;
use App\PR;
use App\SR;
use App\Kendaraan;
use PDF;
use App\Riksama;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BaRiksamaController extends Controller
{
    public function create(){
        $rawDataRiksama = OK::orderBy('id', 'desc')->get();
        return view('transport/bariksama-create', [
            'rawDataRiksama' => $rawDataRiksama
            ]);
    }

    public function store(Request $request)
    {
        $data = Riksama::select('id', 'kd_riksama', 'tgl')
            ->whereYear('tgl', date('Y'))
            ->orderBy('id', 'desc')->count();
        $tahun_sekarang = date('Ym');
        if ($data> 0) {
            $kd_riksama = 'BAR' . $tahun_sekarang . sprintf('%05s', $data + 1);
            $no_riksama = sprintf('%05s', $data + 1);
        } else {
            $kd_riksama = 'BAR' . $tahun_sekarang . sprintf('%05s', 1);
            $no_riksama = sprintf('%05s', 1);
        }

        $tgl = $request->input('tgl');
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $periode = $request->input('periode');
        $kd_ok = $request->input('kd_ok');
        
        $newRiksama = new Riksama();
        $newRiksama->kd_riksama = $kd_riksama;
        $newRiksama->no_riksama = $no_riksama;
        $newRiksama->tgl = $tgl;
        $newRiksama->tgl_awal = $tgl_awal;
        $newRiksama->tgl_akhir = $tgl_akhir;
        $newRiksama->periode = $periode;
        $newRiksama->kd_ok = $kd_ok;
        $newRiksama->save();

        $getKd_sr = OK::where('kd_ok', $kd_ok)->first();
        $updateSR = SR::where('kd_sr', $getKd_sr->getPR->kd_sr)->first();
        $updateSR->status = 'RIKSAMA';
        $updateSR->save();
                
        return redirect('transport/bariksama-tampil');
    } 

    public function edit($id){
        $riksama = Riksama::where('id', $id)->first();
        return view('transport/bariksama-edit', ['riksama' => $riksama]);
    }

    public function update($id, Request $request)
    {
        $tgl = $request->input('tgl');
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $periode = $request->input('periode');
        
        $newRealisasi = Riksama::findOrFail($id);
        $newRealisasi->tgl = $tgl;
        $newRealisasi->tgl_awal = $tgl_awal;
        $newRealisasi->tgl_akhir = $tgl_akhir;
        $newRealisasi->periode = $periode;
        $newRealisasi->save(); 

        return redirect('transport/bariksama-tampil');
    }
    public function tampil(){
        $riksama = Riksama::orderBy('id', 'desc')
        ->paginate(10);
        return view('transport/bariksama-tampil', ['riksama' => $riksama]);
    }

    public function cari(Request $data){
        $key = $data->key;
        $riksama = Riksama::where('no_riksama','like',"%".$key."%")
        ->paginate(10);;
        return view('transport/bariksama-tampil', ['riksama' => $riksama]);
    }

    public function print($kd_riksama)
    {
        Carbon::setLocale('id');
        $pdf = Riksama::where('kd_riksama', $kd_riksama)->first();
        $tgl_awal = Carbon::createFromFormat('Y-m-d',$pdf->tgl_awal);
        $tgl_akhir = Carbon::createFromFormat('Y-m-d',$pdf->tgl_akhir);
        $waktu = $tgl_awal->diffInMonths($tgl_akhir) + 1;
        $hari = $tgl_awal->diffInDays($tgl_akhir) + 1;
        $pdf = PDF::loadView('transport/bariksama-print', [
            'pdf' => $pdf,
            'waktu' => $waktu,
            'hari' => $hari
        ]);
        return $pdf->stream();
    }

    public function print_esd($kd_riksama)
    {
        Carbon::setLocale('id');
        $pdf = Riksama::where('kd_riksama', $kd_riksama)->first();
        $pdf1=$pdf->kd_ok;
        $ok = OK::where('kd_ok', $pdf1)->first();
        $ok1=$ok->kd_pr;
        $PR = PR::where('kd_pr', $ok1)->first();
        $PR1=$ok->kd_sr;
        // $SR = SR::where('kd_sr', $PR1)->first();
        // $SR1=$ok->kd_ba;

        $sr = SR::where('kd_sr', 'SR20201100002')->first();
        
        $tgl_awal = Carbon::createFromFormat('Y-m-d',$pdf->tgl_awal);
        $tgl_akhir = Carbon::createFromFormat('Y-m-d',$pdf->tgl_akhir);
        $waktu = $tgl_awal->diffInMonths($tgl_akhir) + 1;
        $hari = $tgl_awal->diffInDays($tgl_akhir) + 1;
        
        $pdf = PDF::loadView('transport/bariksama-esd-print', [
            'pdf' => $pdf,
            'sr' => $sr,
            'waktu' => $waktu,
            'hari' => $hari
        ]);
        return $pdf->stream();
    }
}
