<?php

namespace App\Http\Controllers;
use App\WUM;
use App\Clearing;
use Illuminate\Http\Request;

class ClearingController extends Controller
{
    public function create(){
        $rawDataWum = WUM::orderBy('id', 'desc')
        ->get();
        return view('transport/clearing-create', ['rawDataWum' => $rawDataWum]);
    }

    public function store(Request $request)
    {
        $data = Clearing::select('id', 'kd_clearing', 'tgl')
                ->whereYear('tgl', date('Y'))
                ->orderBy('id', 'desc')->count();
            $tahun_sekarang = date('Ym');
            if ($data > 0) {
                $kd_clearing = 'CLR' . $tahun_sekarang . sprintf('%05s', $data + 1);
            } else {
                $kd_clearing = 'CLR' . $tahun_sekarang . sprintf('%05s', 1);
            }

            $tgl = $request->input('tgl');
            $kd_wum = $request->input('kd_wum');
            $no_clearing = $request->input('no_clearing');
            
            $newRealisasi = new Clearing();
            $newRealisasi->kd_clearing = $kd_clearing;
            $newRealisasi->no_clearing = $no_clearing;
            $newRealisasi->tgl = $tgl;
            $newRealisasi->kd_wum = $kd_wum;
            $newRealisasi->save();

            // $newRealisasi = Uangmuka::where('kd_uangmuka', $kd_uangmuka)->first();
            // $newRealisasi->status = 'Release';
            // $newRealisasi->save();
                    
            return redirect('transport/clearing-create');
    }

    public function tampil()
    {
        $clearing = Clearing::all();
        return view('transport/clearing-tampil', ['clearing' => $clearing]);
    }
}
