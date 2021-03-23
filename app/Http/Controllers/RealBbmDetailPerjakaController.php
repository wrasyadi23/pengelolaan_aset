<?php

namespace App\Http\Controllers;
use App\RealisasiUm;
use App\RealisasiUmDet;
use PDF;
use Illuminate\Http\Request;

class RealBbmDetailPerjakaController extends Controller
{
    public function create(){
        $getRealUm = RealisasiUm::orderBy('id', 'desc');
        return view('transport/umperjaka-realbbm-detail', ['getRealUm' => $getRealUm]);

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
                                
            return redirect('transport/umperjaka-realbbm-detail');
   }
}
