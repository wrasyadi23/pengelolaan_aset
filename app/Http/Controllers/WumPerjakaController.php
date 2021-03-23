<?php

namespace App\Http\Controllers;
use App\UangMuka;
use App\WUM;
use PDF;
use Illuminate\Http\Request;

class WumPerjakaController extends Controller
{
    public function create(){
        $rawDataUM = UangMuka::orderBy('id', 'desc')
        ->where('status','Requested')
        ->get();
        return view('transport/wum-create', [
            'rawDataUM' => $rawDataUM
        ]);

    }

    public function store(Request $request)
    {
        $data = WUM::select('id', 'kd_wum', 'tgl')
                ->whereYear('tgl', date('Y'))
                ->orderBy('id', 'desc')->count();
            $tahun_sekarang = date('Ym');
            if ($data > 0) {
                $kd_wum = 'WUM' . $tahun_sekarang . sprintf('%05s', $data + 1);
            } else {
                $kd_wum = 'WUM' . $tahun_sekarang . sprintf('%05s', 1);
            }

            $tgl = $request->input('tgl');
            $kd_uangmuka = $request->input('kd_uangmuka');
            $no_wum = $request->input('no_wum');
            
            $newRealisasi = new WUM();
            $newRealisasi->kd_wum = $kd_wum;
            $newRealisasi->no_wum = $no_wum;
            $newRealisasi->tgl = $tgl;
            $newRealisasi->kd_uangmuka = $kd_uangmuka;
            $newRealisasi->save();

            $newRealisasi = Uangmuka::where('kd_uangmuka', $kd_uangmuka)->first();
            $newRealisasi->status = 'Release';
            $newRealisasi->save();
                    
            return redirect('transport/wum-tampil');
    
    }

    public function tampilwum()
    {
        $wum = WUM::all();
        return view('transport/wum-tampil', ['wum' => $wum]);
    }

    public function edit($id)
    {
        $editwum = WUM::where('id', $id)->first();
        return view('transport/wum-edit',['editwum' => $editwum]);
    }

    public function update($id, Request $request)
    {
        
        $no_wum = $request->input('no_wum');
        $tgl = $request->input('tgl');

        $newRealisasi = WUM::findOrFail($id);
        $newRealisasi->no_wum = $no_wum;
        $newRealisasi->tgl = $tgl;
        $newRealisasi->save();


        return redirect('transport/wum-tampil');
    }

    public function cetak($kd_wum){
        $pdf = WUM::where('kd_wum', $kd_wum)->first();
        // $tgl_awal = Carbon::createFromFormat('Y-m-d',$pdf->tgl_awal);
        // $tgl_akhir = Carbon::createFromFormat('Y-m-d',$pdf->tgl_akhir);
        // $waktu = $tgl_awal->diffInMonths($tgl_akhir) + 1;
        // $hari = $tgl_awal->diffInDays($tgl_akhir) + 1;
        $pdf = PDF::loadView('transport/wum-cetak', [
            'pdf' => $pdf
            // 'waktu' => $waktu,
            // 'hari' => $hari
            ]);
        return $pdf->stream();
    }
    
}
