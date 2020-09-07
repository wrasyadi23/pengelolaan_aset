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
        $data = Uangmuka::select('id', 'kd_uangmuka', 'tgl')
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
            $newUangmuka->tgl_awal = $tgl_awal;
            $newUangmuka->tgl_akhir = $tgl_akhir;
            $newUangmuka->uraian = $uraian;
            $newUangmuka->nilai_uangmuka = $nilai_uangmuka;
            $newUangmuka->status = 'Requested';
            $newUangmuka->nik = $nik;
            $newUangmuka->kd_aktifitas_rkap = $kd_aktifitas_rkap;
            $newUangmuka->save();
    
            return redirect('transport/uangmuka')->with('message-success','Data berhasil disimpan.');
        }
    }

    public function edit($kd_uangmuka)
    {
        $karyawan = Karyawan::all();
        $rkapDetail = RkapDetail::all();
        $rawDataUM = Uangmuka::where('kd_uangmuka', $kd_uangmuka)->first();
        
        return view('transport/uangmuka-edit', [
            'karyawan' => $karyawan,
            'rkapDetail' => $rkapDetail,
            'rawDataUM' => $rawDataUM,
        ]);
    }

    public function update($kd_uangmuka, Request $request)
    {
        $no_uangmuka = $request->no_uangmuka;
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        $uraian = $request->uraian;
        $nilai_uangmuka = $request->nilai_uangmuka;
        $nik = $request->nik;
        $kd_aktifitas_rkap = $request->kd_aktifitas_rkap;

        $update = Uangmuka::where('kd_uangmuka', $kd_uangmuka)->first();
        $update->no_uangmuka = $no_uangmuka;
        $update->tgl_awal = $tgl_awal;
        $update->tgl_akhir = $tgl_akhir;
        $update->uraian = $uraian;
        $update->nilai_uangmuka = $nilai_uangmuka;
        $update->nik = $nik;
        $update->kd_aktifitas_rkap = $kd_aktifitas_rkap;
        $update->save();

        return redirect('transport/uangmuka-detail/' . $kd_uangmuka)->with('message-success', 'Data berhasil diupdate.');
    }

    public function detail($kd_uangmuka)
    {
        $rawDataUM = Uangmuka::where('kd_uangmuka', $kd_uangmuka)->first();
        return view('transport/uangmuka-detail', ['rawDataUM' => $rawDataUM]);
    }

    // koordinasi dengan mas henda
    public function data() 
    {
        if (Auth::user()->role == 'Admin') {
            $rawDataUM = Uangmuka::all();
        } 
        elseif (Auth::user()->role == 'Worker' || Auth::user()->role == 'User') {
            $rawDataUM = uangmuka::where('nik', Auth::user()->nik)->get();
        }

        return view('transport/uangmuka-data', ['rawDataUM' => $rawDataUM]);
    }
}
