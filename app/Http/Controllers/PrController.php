<?php

namespace App\Http\Controllers;
use App\Sr;
use App\PR;
use Illuminate\Http\Request;
class PrController extends Controller
{
    public function create(){
        $rawDataSR = SR::orderBy('id', 'desc')->get();
        return view('transport/pr-create', [
            'rawDataSR' => $rawDataSR
            ]);
    }

    public function simpan(Request $request)
    {
            $data = PR::select('id', 'no_sr', 'tgl')
                ->whereYear('tgl', date('Y'))
                ->orderBy('id', 'desc')->count();
            $tahun_sekarang = date('Ym');
            if ($data > 0) {
                $getnopr = 'PR' . $tahun_sekarang . sprintf('%05s', $data + 1);
            } else {
                $getnopr = 'PR' . $tahun_sekarang . sprintf('%05s', 1);
            }
    
            $tgl = $request->input('tgl');
            $kd_sr = $request->input('kd_sr');
            $no_pr = $request->input('no_pr');
            
            $newRealisasi = new PR();
            $newRealisasi->kd_pr = $getnopr;
            $newRealisasi->no_pr = $no_pr;
            $newRealisasi->tgl = $tgl;
            $newRealisasi->kd_sr = $kd_sr;
            $newRealisasi->save();

            $newRealisasi = SR::where('id', $id)->first();
            $newRealisasi->keterangan = 'Jadipr';
            $newRealisasi->save();
                    
            return redirect('transport/pr-tampil');
    }

    public function cari(Request $data){
        $key = $data->key;
        $pr = PR::where('no_pr','like',"%".$key."%")
        ->paginate(10);
        return view('transport/sewa-pr-tampil', ['pr' => $pr]);
    }

    public function tampilpr(){
        $pr = PR::orderBy('id', 'desc')
        ->paginate(10);
        return view('transport/sewa-pr-tampil', ['pr' => $pr]);
    }

    public function edit($id)
    {
        $editpr = PR::where('id', $id)->first();
        return view('transport/sewa-pr-edit', ['editpr' => $editpr]);
    }

    public function update($id, Request $request)
    {
        $no_pr = $request->input('no_pr');
        $tgl = $request->input('tgl');

        $newRealisasi = PR::findOrFail($id);
        $newRealisasi->no_pr = $no_pr;
        $newRealisasi->tgl = $tgl;
        $newRealisasi->save();
                
        return redirect('transport/sewa-pr-tampil');
    }
}
