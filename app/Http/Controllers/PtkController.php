<?php

namespace App\Http\Controllers;
use App\Karyawan;
use App\Uangmuka;
use App\Ptk;
use PDF;
use App\RkapDetail;
use Illuminate\Http\Request;

class PtkController extends Controller
{
    public function tampil(){
        $ptk = Ptk::orderBy('id', 'desc')
        ->where('status', '=', 'Requested')
        ->get();
        return view('transport/umperjaka-ptk-tampil', ['ptk' => $ptk]);
    }

    public function create()
    {
        $karyawan = Karyawan::all();
        $rkapDetail = RkapDetail::all();

        return view('transport/umperjaka-ptk-create', compact('karyawan','rkapDetail'));
    }

    public function store(Request $request)
    {
        $data = Ptk::select('id', 'kd_ptk', 'tgl')
            ->whereYear('tgl', date('Y'))
            ->orderBy('id', 'desc')->count();
        $tahun_sekarang = date('Ym');
        if ($data > 0) {
            $kd_ptk = 'PTK' . $tahun_sekarang . sprintf('%05s', $data + 1);
        } else {
            $kd_ptk = 'PTK' . $tahun_sekarang . sprintf('%05s', 1);
        }

        $data = Ptk::select('id','kd_ptk')
            ->orderBy('id', 'desc')->count();
        if ($data > 0) {
            $no_ptk = 'PTK-' . sprintf('%04s', $data + 1);
        } else {
            $no_ptk = 'PTK-' . sprintf('%04s', 1);
        }

        $uraian = $request->uraian;
        $nik = $request->nik;
        $kd_aktifitas_rkap = $request->kd_aktifitas_rkap;

        $newpTK = new Ptk;
        $newpTK->kd_ptk = $kd_ptk;
        $newpTK->no_ptk = $no_ptk;
        $newpTK->tgl = date('Y-m-d');
        $newpTK->uraian = $uraian;
        $newpTK->status = 'Requested';
        $newpTK->nik = $nik;
        $newpTK->kd_aktifitas_rkap = $kd_aktifitas_rkap;
        $newpTK->save();

            return redirect('transport/umperjaka-ptk-detail')->with('message-success','Data berhasil disimpan.');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::all();
        $rkapDetail = RkapDetail::all();
        $editptk = Ptk::where('kd_ptk', $id)->first();
        // dd($editptk);
        return view('transport/umperjaka-ptk-edit', compact('karyawan','rkapDetail','editptk'));
    }

    public function print($kd_ptk)
    {
        $ptk = Ptk::where('kd_ptk', $kd_ptk)->first();

//        dd($sr->getSRSewaPivot);
//        $sr = SR::findOrFail($kd_sr);
        $pdf = PDF::loadView('transport/umperjaka-ptk-print', ['ptk' => $ptk]);
        return $pdf->stream();
    }
}
