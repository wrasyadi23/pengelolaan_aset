<?php

namespace App\Http\Controllers;
use App\Sr;
use App\Kontrak;
use App\Kendaraan;
use App\KontrakBA;
use Illuminate\Http\Request;

class SrController extends Controller
{
    public function create(){
        $rawDataBA = KontrakBA::orderBy('id', 'desc')->get();
        return view('transport/sewa-sr-create', [
            'rawDataBA' => $rawDataBA
            ]);
    }

    public function store(Request $request)
    {
            $data = SR::select('id', 'kd_sr')
            ->orderBy('id', 'desc')->count();
        if ($data > 0) {
            $sr = 'SR' .  sprintf('%04s', $data + 1);
        } else {
            $sr = 'SR' .  sprintf('%04s', 1);
        }
        
        $data = SR::select('id', 'no_sr', 'tgl')
            ->whereYear('tgl', date('Y'))
            ->orderBy('id', 'desc')->count();
        $tahun_sekarang = date('Ym');
        if ($data > 0) {
            $getnosr = 'SR' . $tahun_sekarang . sprintf('%05s', $data + 1);
        } else {
            $getnosr = 'SR' . $tahun_sekarang . sprintf('%05s', 1);
        }

        $tgl = $request->input('tgl');
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $kd_ba = $request->input('kd_ba');
        
        $newRealisasi = new SR();
        $newRealisasi->kd_sr = $sr;
        $newRealisasi->no_sr = $getnosr;
        $newRealisasi->tgl = $tgl;
        $newRealisasi->tgl_awal = $tgl_awal;
        $newRealisasi->tgl_akhir = $tgl_akhir;
        $newRealisasi->keterangan = 'Request';
        $newRealisasi->kd_ba = $kd_ba;
        $newRealisasi->save();
                
        return redirect('transport/sewa-sr-create');
    }

    public function tampilsr(){
        $sr = SR::orderBy('id', 'desc')
        ->where('keterangan', '=', 'Request')
        ->paginate(10);
        return view('transport/sewa-sr-tampil', ['sr' => $sr]);
    }

    public function edit($id)
    {
        $editsr = SR::where('id', $id)->first();
        return view('transport/sewa-sr-edit', ['editsr' => $editsr]);
    }
}
