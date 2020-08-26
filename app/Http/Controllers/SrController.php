<?php

namespace App\Http\Controllers;
use App\Sr;
use App\Kontrak;
use App\Srfull;
use App\Kendaraan;
use App\KontrakBA;
use PDF;
use Illuminate\Http\Request;

class SrController extends Controller
{
    public function create(){
        $rawDataBA = KontrakBA::orderBy('id', 'desc')->get();
        return view('transport/sr-create', [
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
            $getnosr = 'SR' . $tahun_sekarang . sprintf('%05s', $data + 1);
        } else {
            $getnosr = 'SR' . $tahun_sekarang . sprintf('%05s', 1);
        }

        $tgl = $request->input('tgl');
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $kd_ba = $request->input('kd_ba');
        
        $newRealisasi = new SR();
        $newRealisasi->kd_sr = $getnosr;
        $newRealisasi->no_sr = '-';
        $newRealisasi->tgl = $tgl;
        $newRealisasi->tgl_awal = $tgl_awal;
        $newRealisasi->tgl_akhir = $tgl_akhir;
        $newRealisasi->keterangan = 'Request';
        $newRealisasi->kd_ba = $kd_ba;
        $newRealisasi->save();
                
        return redirect('transport/sr-tampil');
    }

    public function tampilsr(){
        $sr = SR::orderBy('id', 'desc')
        ->where('keterangan', '=', 'Request')
        ->paginate(10);
        return view('transport/sr-tampil', ['sr' => $sr]);
    }

    public function detail(){
        $sr = Srfull::orderBy('no_sr', 'desc')
        ->paginate(10);
        return view('transport/sr-detail', ['sr' => $sr]);
    }

    public function edit($id)
    {
        $editsr = SR::where('id', $id)->first();
        return view('transport/sr-edit', ['editsr' => $editsr]);
    }
    public function update($id, Request $request)
    {
        $no_sr = $request->input('no_sr');
        $tgl = $request->input('tgl');
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $keterangan = $request->input('keterangan');
        
        $newRealisasi = SR::findOrFail($id);
        $newRealisasi->no_sr = $no_sr;
        $newRealisasi->tgl = $tgl;
        $newRealisasi->tgl_awal = $tgl_awal;
        $newRealisasi->tgl_akhir = $tgl_akhir;
        $newRealisasi->keterangan = $keterangan;
        $newRealisasi->save();
                
        return redirect('transport/sr-tampil');
    }

    public function cari(Request $data){
        $key = $data->key;
        $sr = SR::where('no_sr','like',"%".$key."%")
        ->paginate(10);
        return view('transport/sr-tampil', ['sr' => $sr]);
    }

    public function preview($no_sr)
    {
        $pdf = Srfull::where('no_sr', $no_sr)->get();
        $pdf = PDF::loadView('transport/sr-preview', ['pdf' => $pdf]);
        return $pdf->stream();
    }
}
