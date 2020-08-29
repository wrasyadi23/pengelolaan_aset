<?php

namespace App\Http\Controllers;
use App\OK;
use App\SR;
use PDF;
use App\Riksama;
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
        //get kode Ba Riksama
        $data = Riksama::select('id','kd_riksama')
            ->orderBy('id', 'desc')->count();
        if ($data > 0) {
            $getkdriksama = 'RIK' . sprintf('%04s', $data + 1);
        } else {
            $getkdriksama = 'RIK' . sprintf('%04s', 1);
        }

         //get kode No Riksama
        $data = Riksama::select('id', 'kd_riksama', 'tgl')
                ->whereYear('tgl', date('Y'))
                ->orderBy('id', 'desc')->count();
            $tahun_sekarang = date('Ym');
            if ($data > 0) {
                $getnoriksama = 'BARIK' . $tahun_sekarang . sprintf('%05s', $data + 1);
            } else {
                $getnoriksama = 'BARIK' . $tahun_sekarang . sprintf('%05s', 1);
            }

            $tgl = $request->input('tgl');
            $kd_riksama = $request->input('kd_riksama');
            $no_riksama = $request->input('no_riksama');
            $tgl_awal = $request->input('tgl_awal');
            $tgl_akhir = $request->input('tgl_akhir');
            $periode = $request->input('periode');
            $kd_ok = $request->input('kd_ok');
            
            $newRealisasi = new Riksama();
            $newRealisasi->kd_riksama = $getkdriksama;
            $newRealisasi->no_riksama = $getnoriksama;
            $newRealisasi->tgl = $tgl;
            $newRealisasi->tgl_awal = $tgl_awal;
            $newRealisasi->tgl_akhir = $tgl_akhir;
            $newRealisasi->periode = $periode;
            $newRealisasi->kd_ok = $kd_ok;
            $newRealisasi->save();

            // $newRealisasi = SR::where('kd_sr', $kd_sr)->first();
            // $newRealisasi->keterangan = 'Terbayar';
            // $newRealisasi->save();
                    
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
    public function tampilriksama(){
        $riksama = Riksama::orderBy('id', 'desc')
        ->paginate(10);
        return view('transport/bariksama-tampil', ['riksama' => $riksama]);
    }

    public function print($no_riksama)
    {
        $pdf = Riksama::where('no_riksama', $no_riksama)->get();
        $pdf = PDF::loadView('transport/bariksama-print', ['pdf' =>$pdf]);
        return $pdf->stream();
    }
}
