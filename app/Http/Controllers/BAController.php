<?php

namespace App\Http\Controllers;
use App\Kontrak;
use App\KontrakBA;
use Auth;
use File;
use Illuminate\Http\Request;

class BAController extends Controller
{
    public function index()
    {
        $rawDataSP = Kontrak::where('status','Requested')->get();
        return view('transport/sewa-ba-create',[
            'rawDataSP' => $rawDataSP
        ]);
    }

    public function store(Request $request)
    {
        $data = KontrakBA::select('id', 'kd_ba', 'tgl')
            ->whereYear('tgl', date('Y'))
            ->orderBy('id', 'desc')->count();
        $tahun_sekarang = date('Ym');
        if ($data > 0) {
            $getkdba = 'BA' . $tahun_sekarang . sprintf('%05s', $data + 1);
        } else {
            $getkdba = 'BA' . $tahun_sekarang . sprintf('%05s', 1);
        }

        $no_ba = $request->input('no_ba');
        $uraian = $request->input('uraian');
        $tgl = $request->input('tgl');
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $kd_sp = $request->input('kd_sp');
        
        $newRealisasi = new KontrakBA();
        $newRealisasi->kd_ba = $getkdba;
        $newRealisasi->no_ba = $no_ba;
        $newRealisasi->tgl_akhir = $tgl_akhir;
        $newRealisasi->tgl = $tgl;
        $newRealisasi->tgl_awal = $tgl_awal;
        $newRealisasi->uraian = $uraian;
        $newRealisasi->kd_sp = $kd_sp;
        $newRealisasi->save();
        
        // $newRealisasi = Kontrak::where('id', $id)->first();
        // $newRealisasi->status = 'Aktif';
        // $newRealisasi->save();
        
        return redirect('transport/sewa-ba-create');
    
    }
}
