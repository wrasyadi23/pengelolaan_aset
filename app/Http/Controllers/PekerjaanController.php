<?php

namespace App\Http\Controllers;

use App\AreaAlamat;
use App\AreaKeterangan;
use App\AreaKlasifikasi;
use App\PekerjaanFile;
use App\PekerjaanKlasifikasi;
use App\PekerjaanKapasitas;
use App\Pekerjaan;
use App\PekerjaanVerifikasi;
use App\Regu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use File;
use Auth;

class PekerjaanController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'Admin') {
            $pekerjaan = Pekerjaan::all();
        } 
        
        elseif (Auth::user()->role == 'Worker') {
            $pekerjaan = Pekerjaan::where(
                'kd_klasifikasi_pekerjaan', Auth::user()->getKaryawan->getRegu->getKlasifikasi->map->only('kd_klasifikasi_pekerjaan')
            )->with('getKlasifikasi')->get();
        } 
        
        else {
            $pekerjaan = Pekerjaan::where('nik', Auth::user()->nik)
            ->orderBy('booknumber', 'desc')
            ->get();
        }

        return view('pemeliharaan/pekerjaan', [
            'pekerjaan' => $pekerjaan,
        ]);
    }

    public function create()
    {
        $area_klasifikasi = AreaKlasifikasi::all();
        $pekerjaan_klasifikasi = PekerjaanKlasifikasi::all();
        return view('pemeliharaan/pekerjaan-create', [
            'area_klasifikasi' => $area_klasifikasi,
            'pekerjaan_klasifikasi' => $pekerjaan_klasifikasi
        ]);
    }

    public function store(request $request)
    {
        $data = Pekerjaan::select('id', 'booknumber', 'tanggal_pekerjaan')
            ->whereYear('tanggal_pekerjaan', date('Y'))
            ->orderBy('id', 'desc')->count();
        $tahun_sekarang = date('Ym');
        if ($data > 0) {
            $booknumber = $tahun_sekarang . sprintf('%05s', $data + 1);
        } else {
            $booknumber = $tahun_sekarang . sprintf('%05s', 1);
        }

        $nama = $request->nama;
        $nik = $request->nik;
        $telepon = $request->telepon;
        $tanggal_pekerjaan = date('Y-m-d h:m:s');
        $uraian = $request->uraian;
        $status = $request->status;
        $kd_area = $request->kd_area;
        $kd_alamat = $request->kd_alamat;
        $kd_keterangan = $request->kd_keterangan;
        $kd_klasifikasi_pekerjaan = $request->kd_klasifikasi_pekerjaan;

        $newPekerjaan = new Pekerjaan;
        $newPekerjaan->booknumber = $booknumber;
        $newPekerjaan->nama = $nama;
        $newPekerjaan->nik = $nik;
        $newPekerjaan->telepon = $telepon;
        $newPekerjaan->tanggal_pekerjaan = $tanggal_pekerjaan;
        $newPekerjaan->uraian = $uraian;
        $newPekerjaan->status = 'Requested';
        $newPekerjaan->kd_area = $kd_area;
        $newPekerjaan->kd_alamat = $kd_alamat;
        $newPekerjaan->kd_keterangan = $kd_keterangan;
        $newPekerjaan->kd_klasifikasi_pekerjaan = $kd_klasifikasi_pekerjaan;
        $newPekerjaan->save();

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $key => $foto) {
                $uid = uniqid(time(), false); // Generate random unique id
                $foto->move(public_path('pemeliharaan'), $uid . '_' . $foto->getClientOriginalName());
                $pekerjaanFile = new PekerjaanFile;
                $pekerjaanFile->booknumber = $booknumber;
                $pekerjaanFile->file = $uid . '_' . $foto->getClientOriginalName();
                $pekerjaanFile->save();
            }
        }

        return redirect('pemeliharaan/pekerjaan')->with('message-success', 'Data berhasil disimpan.');
    }

    public function detail($booknumber)
    {
        $pekerjaan = Pekerjaan::where('booknumber', $booknumber)->first();

        return view('pemeliharaan/pekerjaan-detail', [
            'pekerjaan' => $pekerjaan,
        ]);
    }

    public function approve($booknumber, request $request)
    {
        $tanggal_pelaksanaan = $request->tanggal_pelaksanaan;

        $pekerjaan = Pekerjaan::where('booknumber', $booknumber)->first();
        $pekerjaan->tanggal_pelaksanaan = $tanggal_pelaksanaan;
        $pekerjaan->status = 'Approved';
        $pekerjaan->save();

        return redirect('pemeliharaan/pekerjaan')->with('message-success-approve', 'Data telah diapprove.');
    }

    public function disapprove($booknumber, Request $request)
    {
        $catatan = $request->catatan;
        
        $pekerjaan = Pekerjaan::where('booknumber', $booknumber)->first();
        $pekerjaan->tanggal_pelaksanaan = '0000-00-00';
        $pekerjaan->status = 'Requested';
        $pekerjaan->save();

        $verifikasi = new PekerjaanVerifikasi;
        $verifikasi->booknumber = $booknumber;
        $verifikasi->status = 'Requested';
        $verifikasi->tgl = date('Y-m-d');
        $verifikasi->catatan = $catatan;
        $verifikasi->save();

        return redirect('pemeliharaan/pekerjaan-detail/' . $booknumber)->with('dissaprove', 'Status berhasil dirubah.');
        
    }
}
