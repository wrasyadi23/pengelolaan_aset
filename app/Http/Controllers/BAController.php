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
        
        $newKontrakBA = new KontrakBA();
        $newKontrakBA->kd_ba = $getkdba;
        $newKontrakBA->no_ba = $no_ba;
        $newKontrakBA->tgl_akhir = $tgl_akhir;
        $newKontrakBA->tgl = $tgl;
        $newKontrakBA->tgl_awal = $tgl_awal;
        $newKontrakBA->uraian = $uraian;
        $newKontrakBA->kd_sp = $kd_sp;
        $newKontrakBA->jenis_ba = 'Sewa-Esidentil';
        $newKontrakBA->save();
        
        $updateKontrak = Kontrak::where('kd_sp', $kd_sp)->first();
        $updateKontrak->status = 'Aktif';
        $updateKontrak->save();
        
        return redirect('transport/sewa-ba-tampil');
    }

    public function tampilba(){
        $basewa = kontrakBA::orderBy('id', 'desc')->paginate(10);
        return view('/transport/sewa-ba-tampil', ['basewa' => $basewa]);
    }
    
    public function editba($kd_ba)
    {
        $editba = KontrakBA::where('kd_ba', $kd_ba)->first();
        return view('transport/sewa-ba-edit', ['editba' => $editba]);
    }

    public function update(Request $request, $id){
        
        $uraian = $request->input('uraian');
        $tgl = $request->input('tgl');
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        $kd_sp = $request->input('kd_sp');
        
        $newRealisasi = KontrakBA::findOrFail($id);
        $newRealisasi->tgl_akhir = $tgl_akhir;
        $newRealisasi->tgl = $tgl;
        $newRealisasi->tgl_awal = $tgl_awal;
        $newRealisasi->uraian = $uraian;
        $newRealisasi->save();
        
        return redirect('transport/sewa-ba-tampil');
    }

}
