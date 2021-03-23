<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WUM;
use App\RealisasiUm;
use App\Uangmuka;
use PDF;
class RealUmPerjakaController extends Controller
{
    public function create(){
        $rawDataWum = WUM::all();
        return view('transport/umperjaka-realisasi', compact('rawDataWum'));
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
                
        return redirect('transport/umperjaka-real-detail');

    }
    public function view($kd_real_um){
        $realum = RealisasiUm::where('kd_real_um', $kd_real_um)->first();
        // $tgl_awal = Carbon::createFromFormat('Y-m-d',$pdf->tgl_awal);
        // $tgl_akhir = Carbon::createFromFormat('Y-m-d',$pdf->tgl_akhir);
        // $waktu = $tgl_awal->diffInMonths($tgl_akhir) + 1;
        // $hari = $tgl_awal->diffInDays($tgl_akhir) + 1;
        $pdf = PDF::loadView('transport/umperjaka-view', [
            'realum' => $realum
            // 'waktu' => $waktu,
            // 'hari' => $hari
            ]);
        return $pdf->stream();
    }

}
