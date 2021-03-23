<?php

namespace App\Http\Controllers;
use App\PtkRealDetail;
use App\RealisasiUmDet;
use App\Ptk;
use Illuminate\Http\Request;

class PtkDetailController extends Controller
{
    public function create(){
        $getptk = Ptk::orderBy('id', 'desc');
        return view('transport/umperjaka-ptk-detail', ['getptk' => $getptk]);
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
             $kd_real_um = $request->input('kd_ptk');
             $kd_ptk = $request->input('kd_ptk');
         
             $newRealDetail = new RealisasiUmDet();
             $newRealDetail->kd_realum_detail = $kd_realum_detail;
             $newRealDetail->harga = $harga;
             $newRealDetail->uraian = $uraian;
             $newRealDetail->jumlah = $jumlah;
             $newRealDetail->satuan = $satuan;
             $newRealDetail->kd_real_um = $kd_real_um;
             $newRealDetail->keterangan = 'PTK';
             $newRealDetail->save();

             $editPtk = Ptk::where('kd_ptk', $kd_ptk)->first();
             $editPtk->nilai_ptk = $jumlah*$harga;
             $editPtk->save();
                                 
             return redirect('transport/umperjaka-ptk-detail');
    }

    public function tampil()
    {
        $ptkldet = RealisasiUmDet::groupBy('kd_real_um')->get();
        return view('transport/umperjaka-ptk-detail-tampil', ['ptkldet' => $ptkldet]);
    }
}
