<?php

namespace App\Http\Controllers;
use App\Ptk;
use App\WumPtk;
use Illuminate\Http\Request;

class WumPtkPerjakaController extends Controller
{
    public function index()
    {
        $wumptk = WumPtk::all();
        return view('transport/wum-ptk-index', ['wumptk' => $wumptk]);
    }

   public function create(){
    $rawDataPtk = Ptk::orderBy('id', 'desc')
    ->where('status','Requested')
    ->get();
    return view('transport/wum-ptk-create', [
        'rawDataPtk' => $rawDataPtk
    ]);
   }

   public function store(Request $request)
   {
    $data = WumPtk::select('id', 'kd_wum', 'tgl')
    ->whereYear('tgl', date('Y'))
    ->orderBy('id', 'desc')->count();
        $tahun_sekarang = date('Ym');
        if ($data > 0) {
            $kd_wum = 'WMPTK' . $tahun_sekarang . sprintf('%05s', $data + 1);
        } else {
            $kd_wum = 'WMPTK' . $tahun_sekarang . sprintf('%05s', 1);
        }

        $tgl = $request->input('tgl');
        $kd_ptk = $request->input('kd_ptk');
        $no_wum = $request->input('no_wum');

        $newRealisasi = new WumPtk();
        $newRealisasi->kd_wum = $kd_wum;
        $newRealisasi->no_wum = $no_wum;
        $newRealisasi->tgl = $tgl;
        $newRealisasi->kd_ptk = $kd_ptk;
        $newRealisasi->save();

        $newRealisasi = Ptk::where('kd_ptk', $kd_ptk)->first();
        $newRealisasi->status = 'Release';
        $newRealisasi->save();
                
        return redirect('transport/wum-ptk-create');

   }
}
