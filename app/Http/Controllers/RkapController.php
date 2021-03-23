<?php

namespace App\Http\Controllers;
use App\Rkap;
use App\Departemen;
use Illuminate\Http\Request;

class RkapController extends Controller
{
    public function tampilrkap(){
        $rkap = Rkap::all();
        return view('transport/rkap-tampil', ['rkap' => $rkap]);
    }

    public function create(){
        $departemen = Departemen::all();
        return view('transport/rkap-create', ['departemen' => $departemen]);
    }

    public function store(Request $request)
    {
        $data = Rkap::select('id', 'kd_rkap')
            // ->whereYear('tgl', date('Y'))
            ->orderBy('id', 'desc')->count();
        $tahun_sekarang = date('Ym');
        if ($data > 0) {
            $getkdrkap = 'R' . $tahun_sekarang . sprintf('%05s', $data + 1);
        } else {
            $getkdrkap = 'R' . $tahun_sekarang . sprintf('%05s', 1);
        }

    $cost_center = $request->input('cost_center');
    $gl_acc = $request->input('gl_acc');
    $tahun_rkap = $request->input('tahun_rkap');
    $nilai_rkap = $request->input('nilai_rkap');
    $kd_departemen = $request->input('kd_departemen');
    
    $newRealisasi = new Rkap();
    $newRealisasi->kd_rkap = $getkdrkap;
    $newRealisasi->cost_center = $cost_center;
    $newRealisasi->gl_acc = $gl_acc;
    $newRealisasi->tahun_rkap = $tahun_rkap;
    $newRealisasi->nilai_rkap = $nilai_rkap;
    $newRealisasi->kd_departemen = $kd_departemen;
    $newRealisasi->status = 'Aktif';
    $newRealisasi->save();
    
    return redirect('transport/rkap-tampil');
    }

    public function edit($id)
    {
        $editrkap = Rkap::where('id', $id)->first();
        return view('transport/rkap-edit', ['editrkap' =>$editrkap]);
    }

    public function update($id, Request $request)
    {

    $cost_center = $request->input('cost_center');
    $gl_acc = $request->input('gl_acc');
    $tahun_rkap = $request->input('tahun_rkap');
    $nilai_rkap = $request->input('nilai_rkap');
    $status = $request->input('status');
    // $kd_departemen = $request->input('kd_departemen');
    
    $newRealisasi =Rkap::findOrFail($id);
    $newRealisasi->cost_center = $cost_center;
    $newRealisasi->gl_acc = $gl_acc;
    $newRealisasi->tahun_rkap = $tahun_rkap;
    $newRealisasi->nilai_rkap = $nilai_rkap;
    // $newRealisasi->kd_departemen = $kd_departemen;
    $newRealisasi->status = $status;
    $newRealisasi->save();
                
        return redirect('transport/rkap-tampil');
    }
}
