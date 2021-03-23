<?php

namespace App\Http\Controllers;
use App\WUM;
use App\RealisasiUm;
use App\Uangmuka;
use PDF;
use Illuminate\Http\Request;

class RealBbmPerjakaController extends Controller
{
    public function create(){
        $rawDataWum = WUM::all();
        return view('transport/umperjaka-realisasi-bbm', compact('rawDataWum'));
    }

    public function store(Request $request)
    {
        $data = RealisasiUm::select('id', 'kd_real_um', 'tgl')
                ->whereYear('tgl', date('Y'))
                ->orderBy('id', 'desc')->count();
            $tahun_sekarang = date('Ym');
            if ($data > 0) {
                $kd_real_um = 'REAL' . $tahun_sekarang . sprintf('%05s', $data + 1);
            } else {
                $kd_real_um = 'REAL' . $tahun_sekarang . sprintf('%05s', 1);
            }
        
        $kd_wum = $request->input('kd_wum');
        $tgl = $request->input('tgl');
        
        $newRealisasi = new RealisasiUm();
        $newRealisasi->kd_real_um = $kd_real_um;
        $newRealisasi->tgl = $tgl;
        $newRealisasi->kd_wum = $kd_wum;
        $newRealisasi->save();

        // $getKd_wum = WUM::where('kd_wum', $kd_wum)->first();
        // $updateUM = Uangmuka::where('id', $id)->first();
        // $updateUM->status = 'Realisasi';
        // $updateUM->save();
                
        return redirect('transport/umperjaka-realbbm-detail');
    }
}