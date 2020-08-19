<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\Rkap;
use App\RkapDetail;
use App\Uangmuka;
use Auth;
use File;
use Carbon\Carbon;

class uangmukaController extends Controller
{
    public function index()
    {
        $rawDataUM = Uangmuka::all();
        return view('transport/uangmuka', ['rawDataUM' => $rawDataUM]);
    }
    public function create()
    {
        $karyawan = Karyawan::all();
        $rkapDetail = RkapDetail::all();

        return view('transport/uangmuka-create', [
            'karyawan' => $karyawan,
            'rkapDetail' => $rkapDetail,
        ]);
    }

    public function store(Request $request)
    {
        $data = Uangmuka::select('id', 'kd_uangmuka')
            ->whereYear('tgl', date('Y'))
            ->orderBy('id', 'desc')->count();
        $tahun_sekarang = date('Ym');
        if ($data > 0) {
            $kd_uangmuka = 'UM' . $tahun_sekarang . sprintf('%05s', $data + 1);
        } else {
            $kd_uangmuka = 'UM' . $tahun_sekarang . sprintf('%05s', 1);
        }

        $no_uangmuka = $request->no_uangmuka;
        // $tgl = Carbon::today()->format('L');
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        $uraian = $request->uraian;
        $nilai_uangmuka = $request->nilai_uangmuka;
        $nik = $request->nik;
        $kd_aktifitas_rkap = $request->kd_aktifitas_rkap;

        $validasi = Uangmuka::where('no_uangmuka', $no_uangmuka)->get();
        if ($validasi->count() >= 1) {
            return redirect('transport/uangmuka')->with('message-error','Data sudah ada.');
        } else {
            $newUangmuka = new Uangmuka;
            $newUangmuka->kd_uangmuka = $kd_uangmuka;
            $newUangmuka->no_uangmuka = $no_uangmuka;
            $newUangmuka->tgl = date('Y-m-d');
            $newUangmuka->tgl_awal = $request->tgl_awal;
            $newUangmuka->tgl_akhir = $request->tgl_akhir;
            $newUangmuka->uraian = $request->uraian;
            $newUangmuka->nilai_uangmuka = $request->nilai_uangmuka;
            $newUangmuka->status = 'Requested';
            $newUangmuka->nik = $request->nik;
            $newUangmuka->kd_aktifitas_rkap = $request->kd_aktifitas_rkap;
            $newUangmuka->save();
    
            return redirect('transport/uangmuka')->with('message-success','Data berhasil disimpan.');
        }
    }

    public function detail($kd_uangmuka)
    {
        $rawDataUM = Uangmuka::where('kd_uangmuka', $kd_uangmuka)->first();
        return view('transport/uangmuka-detail', ['rawDataUM' => $rawDataUM]);
    }

    public function edit($kd_uangmuka)
    {
        $rawDataUM = Uangmuka::where('kd_uangmuka', $kd_uangmuka)->first();
        return view('transport/uangmuka-detail', ['rawDataUM' => $rawDataUM]);
    }

    public function update($kd_uangmuka, Request $request)
    {
        
    }
}
