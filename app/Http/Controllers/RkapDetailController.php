<?php

namespace App\Http\Controllers;
use App\RkapDetail;
use App\Rkap;
use App\Bagian;
use App\Seksi;
use Illuminate\Http\Request;

class RkapDetailController extends Controller
{
    public function rkapdetail(){
        $rkapdetail = RkapDetail::orderBy('id', 'desc')->paginate(10);
        return view('transport/rkap-detail-tampil', ['rkapdetail' => $rkapdetail]);
}
    public function create(){
        $rkap = Rkap::all();
        $bagian = Bagian::all();
        return view('transport/rkap-detail-create', [
            'rkap' => $rkap,
            'bagian' => $bagian,
        ]);
    }

    public function store(Request $request)
    {
        $data = RkapDetail::select('id', 'kd_rkap')
        // ->whereYear('tgl', date('Y'))
        ->orderBy('id', 'desc')->count();
    $tahun_sekarang = date('Ym');
    if ($data > 0) {
        $kdrkapdet = 'RD' . $tahun_sekarang . sprintf('%05s', $data + 1);
    } else {
        $kdrkapdet = 'RD' . $tahun_sekarang . sprintf('%05s', 1);
    }

    $aktifitas = $request->input('aktifitas');
    $nama_aktifitas = $request->input('nama_aktifitas');
    $uraian = $request->input('uraian');
    $nilai_aktifitas = $request->input('nilai_aktifitas');
    $kd_bagian = $request->input('kd_bagian');
    $kd_seksi = $request->input('kd_seksi');

    $newRealisasi = new RkapDetail();
    $newRealisasi->kd_aktifitas_rkap = $kdrkapdet;
    $newRealisasi->aktifitas = $aktifitas;
    $newRealisasi->nama_aktifitas = $nama_aktifitas;
    $newRealisasi->uraian = $uraian;
    $newRealisasi->kd_bagian = $kd_bagian;
    $newRealisasi->kd_seksi = $kd_seksi;
    $newRealisasi->save();

    return redirect('transport/rkap-detail-tampil');
    }

    public function edit($kd_aktifitas_rkap)
    {
        $rkap = Rkap::all();
        $bagian = Bagian::all();
        // eksisting
        $editrkap = RkapDetail::where('kd_aktifitas_rkap', $kd_aktifitas_rkap)->first();
        $seksi = Seksi::where('kd_bagian', $editrkap->kd_bagian)->get();

        return view('transport/rkap-detail-edit', [
            'editrkap' => $editrkap,
            'bagian' => $bagian,
            'seksi' => $seksi,
            'rkap' => $rkap,
            ]);
    }

    public function update($kd_aktifitas_rkap, Request $request)
    {
        $aktifitas = $request->input('aktifitas');
        $nama_aktifitas = $request->input('nama_aktifitas');
        $uraian = $request->input('uraian');
        $nilai_aktifitas = $request->input('nilai_aktifitas');
        $kd_bagian = $request->input('kd_bagian');
        $kd_seksi = $request->input('kd_seksi');
        $cost_center = $request->input('cost_center');
        $gl_acc = $request->input('gl_acc');

        $newRealisasi = RkapDetail::where('kd_aktifitas_rkap', $kd_aktifitas_rkap)->first();
        $newRealisasi->aktifitas = $aktifitas;
        $newRealisasi->nama_aktifitas = $nama_aktifitas;
        $newRealisasi->uraian = $uraian;
        $newRealisasi->kd_bagian = $kd_bagian;
        $newRealisasi->kd_seksi = $kd_seksi;
        $newRealisasi->save();

        $newRealisasi = Rkap::where('kd_rkap', $newRealisasi->kd_rkap)->first();
        $newRealisasi->cost_center = $cost_center;
        $newRealisasi->gl_acc = $gl_acc;
        $newRealisasi->save();

        return redirect('transport/rkap-detail-tampil');
    }
}
