<?php

namespace App\Http\Controllers;

use App\AreaKlasifikasi;
use App\PekerjaanKlasifikasi;
use App\Pekerjaan;
use Illuminate\Http\Request;

class input_pekerjaanController extends Controller
{
    public function index() {
        return view('pemeliharaan.pekerjaan');
    }

    public function create() {
        $area_klasifikasi = AreaKlasifikasi::all();
        $pekerjaan_klasifikasi = PekerjaanKlasifikasi::all();
        return view('pemeliharaan.pekerjaan-create', [
            'area_klasifikasi' => $area_klasifikasi,
            'pekerjaan_klasifikasi' => $pekerjaan_klasifikasi
        ]);
    }

    public function store(Request $request) {
        // get book number
        $data = Pekerjaan::select('id','bookNumber','tanggal_pekerjaan')
        ->whereYear('tanggal_pekerjaan',date('Y'))
        ->orderBy('id','desc')->count();
        $tahun_sekarang = date('Y m');
        if ($data > 0) {
            $getBookNumber = $tahun_sekarang . sprintf('%05s', $data + 1);
        }
        else {
            $getBookNumber = $tahun_sekarang . sprintf('%05s', 1);
        }

        $bookNumber = $getBookNumber;
        $nama = $request->input('nama');
        $nik = $request->input('nik');
        $kd_klasifikasi_pekerjaan = $request->input('kd_klasifikasi_pekerjaan');
        $tanggal_pekerjaan = date('Y-m-d');
        $uraian = $request->input('uraian');
        if ($request->hasFile('file')) {
            $file = $request->file('file')->storage('public/pemeliharaan',$request->file('file')->getClientOriginalName());
        }

        // menghitung pekerjaan dari data hari terakhir
        $validasi_tanggal_pelaksanaan = Pekerjaan::select('id','tanggal_pelaksanaan')
        ->orderBy('id','desc')->first();
        $validasi_tanggal_pelaksanaan->tanggal_pelaksanaan->count();
        if ($validasi <= 5) {
            $tanggal_pelaksanaan = date('Y-m-d');
        }
        else {
            $tanggal_pelaksanaan = date('Y-m-d') + 1;
        }

        $pekerjaan = new Pekerjaan;
        $pekerjaan->bookNumber = $bookNumber;
        $pekerjaan->nama = 'Mohammad Wava';
        $pekerjaan->nik = '2115446';
        $pekerjaan->kd_klasifikasi_pekerjaan = $kd_klasifikasi_pekerjaan;
        $pekerjaan->tanggal_pekerjaan = $tanggal_pekerjaan;
        $pekerjaan->tanggal_pelaksanaan = $tanggal_pelaksanaan;
        $pekerjaan->uraian = $uraian;
        $pekerjaan->file = $request->file('file')->getClientOriginalName();
        $pekerjaan->status = '1';
        $pekerjaan->save();

        return redirect('pemeliharaan.pekerjaan')->with('message','Data berhasil dimasukkan.');
    }
}
