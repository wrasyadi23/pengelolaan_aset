<?php

namespace App\Http\Controllers;
use App\PR;
use App\OK;
use App\SR;
use Illuminate\Http\Request;

class OkController extends Controller
{
    public function create(){
        $rawDataPR = PR::orderBy('id', 'desc')
        ->get();
        return view('transport/ok-create', [
            'rawDataPR' => $rawDataPR
            ]);
    }

    public function store(Request $request)
    {
            $data = OK::select('id', 'kd_ok', 'tgl')
                ->whereYear('tgl', date('Y'))
                ->orderBy('id', 'desc')->count();
            $tahun_sekarang = date('Ym');
            if ($data > 0) {
                $getnook = 'OK' . $tahun_sekarang . sprintf('%05s', $data + 1);
            } else {
                $getnook = 'OK' . $tahun_sekarang . sprintf('%05s', 1);
            }
    
            $tgl = $request->input('tgl');
            $kd_ok = $request->input('kd_ok');
            $no_ok = $request->input('no_ok');
            $kd_pr = $request->input('kd_pr');
        
            $newOK = new OK();
            $newOK->kd_ok = $getnook;
            $newOK->no_ok = $no_ok;
            $newOK->tgl = $tgl;
            $newOK->kd_pr = $kd_pr;
            $newOK->save();
            
            $getKd_sr = PR::where('kd_pr', $kd_pr)->first();
            $updateSR = SR::where('kd_sr', $getKd_sr->kd_sr)->first();
            $updateSR->keterangan = 'JadiOk';
            $updateSR->save();
                                
            return redirect('transport/ok-tampil');
    }

    public function tampil(){
        $ok = OK::orderBy('id', 'desc')
        ->paginate(10);
        return view('transport/ok-tampil', ['ok' => $ok]);
    }

    public function cari(Request $data){
        $key = $data->key;
        $ok = OK::where('no_ok','like',"%".$key."%")
        ->paginate(10);
        return view('transport/ok-tampil', ['ok' => $ok]);
    }

    public function edit($id)
    {
        $editok = OK::where('id', $id)->first();
        return view('transport/ok-edit', ['editok' => $editok]);
    }

    public function update($id, Request $request)
    {
        $no_ok = $request->input('no_ok');
        $tgl = $request->input('tgl');

        $newRealisasi = OK::findOrFail($id);
        $newRealisasi->no_ok = $no_ok;
        $newRealisasi->tgl = $tgl;
        $newRealisasi->save();
                
        return redirect('transport/ok-tampil');
    }
}
