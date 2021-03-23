<?php

namespace App\Http\Controllers;
use App\RealisasiUm;
use App\RealisasiUmDet;
use PDF;
use Illuminate\Http\Request;

class RealUmPerjakaDetController extends Controller
{
   public function create(){
       $getRealUm = RealisasiUm::orderBy('id', 'desc');
       return view('transport/umperjaka-real-detail', ['getRealUm' => $getRealUm]);
   }

   public function store(Request $request)
   {
    $data = RealisasiUmDet::select('id', 'kd_realum_detail')
    ->orderBy('id', 'desc')->count();
    if ($data > 0) {
        $kd_realum_detail = 'REALDET' .  sprintf('%04s', $data + 1);
    } else {
        $kd_realum_detail = 'REALDET' .  sprintf('%04s', 1);
    }

            $uraian = $request->input('uraian');
            $harga = $request->input('harga');
            $jumlah = $request->input('jumlah');
            $satuan = $request->input('satuan');
            $kd_real_um = $request->input('kd_real_um');
        
            $newRealDetail = new RealisasiUmDet();
            $newRealDetail->kd_realum_detail = $kd_realum_detail;
            $newRealDetail->harga = $harga;
            $newRealDetail->uraian = $uraian;
            $newRealDetail->jumlah = $jumlah;
            $newRealDetail->satuan = $satuan;
            $newRealDetail->kd_real_um = $kd_real_um;
            $newRealDetail->keterangan = 'UM';
            $newRealDetail->save();
                                
            return redirect('transport/umperjaka-real-detail');
   }
    public function index()
    {
        $realdet = RealisasiUmDet::groupBy('kd_real_um')->get();
        return view('transport/umperjaka-real-tampil', ['realdet' => $realdet]);

    }

    public function tampil($kd_real_um)
    {
        $realdettampil = RealisasiUmDet::where('kd_real_um', $kd_real_um)->orderBy('id', 'desc')->get();
        return view('transport/umperjaka-realdet-tampil', ['realdettampil' => $realdettampil]);
            
    }

    public function edit($id)
    {
        $editrealdet = RealisasiUmDet::where('id', $id)->first();
        return view('transport/umperjaka-realdet-edit', ['editrealdet' => $editrealdet]);
    }

    public function update($id, Request $request)
    {
        $uraian = $request->input('uraian');
        $harga = $request->input('harga');
        $jumlah = $request->input('jumlah');
        $satuan = $request->input('satuan');
                   
        $EditealDetail = RealisasiUmDet::findOrFail($id);
        $EditealDetail->harga = $harga;
        $EditealDetail->uraian = $uraian;
        $EditealDetail->jumlah = $jumlah;
        $EditealDetail->satuan = $satuan;
        $EditealDetail->save();

       return redirect('transport/umperjaka-real-tampil');
    }

    
}
