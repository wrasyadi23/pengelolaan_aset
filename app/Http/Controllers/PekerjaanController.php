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
use App\Penilaian;
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
            $pekerjaan = Pekerjaan::where('created_by', Auth::user()->nik)
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
        $tanggal_pekerjaan = date('Y-m-d');
        $uraian = $request->uraian;
        $kd_area = $request->kd_area;
        $kd_alamat = $request->kd_alamat;
        $kd_keterangan = $request->kd_keterangan;
        $kd_klasifikasi_pekerjaan = $request->kd_klasifikasi_pekerjaan;

        $validasi = Pekerjaan::where([
            ['kd_keterangan', $kd_keterangan],
            ['status','Done'],
            ['created_by', Auth::user()->nik],
            ])->get();
        if ($validasi->count() >= 3) {
            return redirect('pemeliharaan/pekerjaan-create')->with('survey-error', 'Silahkan isi survey kepuasan pelanggan untuk pekerjaan sebelumnya.');
        }
        elseif ($validasi->count() < 3) {
            $newPekerjaan = new Pekerjaan;
            $newPekerjaan->booknumber = $booknumber;
            $newPekerjaan->nama = $nama;
            $newPekerjaan->nik = $nik;
            $newPekerjaan->telepon = $telepon;
            $newPekerjaan->tanggal_pekerjaan = $tanggal_pekerjaan;
            $newPekerjaan->uraian = $uraian;
            $newPekerjaan->status = 'Requested';
            $newPekerjaan->created_by = Auth::user()->nik;
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

    }

    public function detail($booknumber)
    {
        $pekerjaan = Pekerjaan::where('booknumber', $booknumber)->first();
        $waitinglist = Pekerjaan::where('kd_klasifikasi_pekerjaan', $pekerjaan->kd_klasifikasi_pekerjaan)
        ->whereNotIn('status', 'Canceled')
        ->get();

        // merubah warna notif 
        if ($pekerjaan->status == 'Requested') {
            $warna = 'btn-primary';
        } elseif ($pekerjaan->status == 'Approved' || $pekerjaan->status == 'In Progress' || $pekerjaan->status == 'Closed') {
            $warna = 'btn-success';
        } elseif ($pekerjaan->status == 'Done' || $pekerjaan->status == 'Revisi') {
            $warna = 'btn-warning';
        } elseif ($pekerjaan->status == 'Canceled') {
            $warna = 'btn-danger';
        }

        return view('pemeliharaan/pekerjaan-detail', [
            'pekerjaan' => $pekerjaan,
            'warna' => $warna,
            'waitinglist' => $waitinglist,
        ]);
    }

    public function revisi($booknumber, request $request)
    {
        $catatan = $request->catatan;

        $pekerjaan = Pekerjaan::where('booknumber', $booknumber)->first();
        $pekerjaan->status = 'Revisi';
        $pekerjaan->save();

        $verifikasi = new PekerjaanVerifikasi;
        $verifikasi->booknumber = $booknumber;
        $verifikasi->status = 'Revisi';
        $verifikasi->tgl = date('Y-m-d');
        $verifikasi->catatan = $catatan . ' - by ' . Auth::user()->role;
        $verifikasi->save();

        return redirect('pemeliharaan/pekerjaan-detail/' . $booknumber)->with('revisi', 'Status berhasil dirubah.');
    }

    public function approve($booknumber, request $request)
    {
        $tanggal_pelaksanaan = $request->tanggal_pelaksanaan;

        $pekerjaan = Pekerjaan::where('booknumber', $booknumber)->first();
        $pekerjaan->tanggal_pelaksanaan = $tanggal_pelaksanaan;
        $pekerjaan->status = 'Approved';
        $pekerjaan->save();

        $verifikasi = new PekerjaanVerifikasi;
        $verifikasi->booknumber = $booknumber;
        $verifikasi->status = 'Approved';
        $verifikasi->tgl = date('Y-m-d');
        $verifikasi->catatan = 'Approved by ' . Auth::user()->role;
        $verifikasi->save();

        return redirect('pemeliharaan/pekerjaan')->with('approve', 'Data telah diapprove.');
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
        $verifikasi->catatan = $catatan . ' by ' . Auth::user()->role;
        $verifikasi->save();

        return redirect('pemeliharaan/pekerjaan-detail/' . $booknumber)->with('dissaprove', 'Status berhasil dirubah.');

    }

    public function proceed($booknumber)
    {
        $pekerjaan = Pekerjaan::where('booknumber', $booknumber)->first();
        $pekerjaan->status = 'In Progress';
        $pekerjaan->save();

        $verifikasi = new PekerjaanVerifikasi;
        $verifikasi->booknumber = $booknumber;
        $verifikasi->status = 'In Progress';
        $verifikasi->tgl = date('Y-m-d');
        $verifikasi->catatan = 'Proceed by ' . Auth::user()->role;
        $verifikasi->save();

        return redirect('pemeliharaan/pekerjaan')->with('proceed', 'Pekerjaan sedang diproses.');
    }

    public function done($booknumber)
    {
        $pekerjaan = Pekerjaan::where('booknumber', $booknumber)->first();
        $pekerjaan->status = 'Done';
        $pekerjaan->save();

        $verifikasi = new PekerjaanVerifikasi;
        $verifikasi->booknumber = $booknumber;
        $verifikasi->status = 'Done';
        $verifikasi->tgl = date('Y-m-d');
        $verifikasi->catatan = 'Done at ' . date('Y-m-d') . ' by ' . Auth::user()->role;
        $verifikasi->save();

        return redirect('pemeliharaan/pekerjaan')->with('done', 'Pekerjaan telah selesai. Silahkan beri penilaian.');
    }

    public function close($booknumber, request $request)
    {
        $data = Penilaian::select('id', 'kd_penilaian')
            ->orderBy('id', 'desc')->count();
        $tahun_sekarang = date('Ym');
        if ($data > 0) {
            $kd_penilaian = 'RATE' . $tahun_sekarang . sprintf('%05s', $data + 1);
        } else {
            $kd_penilaian = 'RATE' . $tahun_sekarang . sprintf('%05s', 1);
        }

        $nilai = $request->nilai;
        $catatan = $request->catatan;

        $pekerjaan = Pekerjaan::where('booknumber', $booknumber)->first();
        $pekerjaan->status = 'Closed';
        $pekerjaan->save();

        $penilaian = new Penilaian;
        $penilaian->kd_penilaian = $kd_penilaian;
        $penilaian->nilai = $nilai;
        $penilaian->tgl = date('Y-m-d');
        $penilaian->catatan = $catatan . ' by ' . $pekerjaan->nama . ' / ' . $pekerjaan->nik;
        $penilaian->kd_pekerjaan = $booknumber;
        $penilaian->save();

        $verifikasi = new PekerjaanVerifikasi;
        $verifikasi->booknumber = $booknumber;
        $verifikasi->status = 'Closed';
        $verifikasi->tgl = date('Y-m-d');
        $verifikasi->catatan = 'Closed by ' . Auth::user()->role;
        $verifikasi->save();

        return redirect('pemeliharaan/pekerjaan-detail/' . $booknumber)->with('close', 'Pekerjaan telah selesai. Terima kasih atas penilaian anda.');
    }

    public function cancel($booknumber)
    {
        $pekerjaan = Pekerjaan::where('booknumber', $booknumber)->first();
        $pekerjaan->tanggal_pelaksanaan = '0000-00-00';
        $pekerjaan->status = 'Canceled';
        $pekerjaan->save();

        $verifikasi = new PekerjaanVerifikasi;
        $verifikasi->booknumber = $booknumber;
        $verifikasi->status = 'Canceled';
        $verifikasi->tgl = date('Y-m-d');
        $verifikasi->catatan = 'Canceled by ' . Auth::user()->role;
        $verifikasi->save();

        return redirect('pemeliharaan/pekerjaan')->with('canceled', 'Permohonan pekerjaan dibatalkan.');
    }

    public function edit($booknumber)
    {
        $area_klasifikasi = AreaKlasifikasi::all();
        $pekerjaan_klasifikasi = PekerjaanKlasifikasi::all();
        // 3 variable di bawah untuk mengambil data existing
        $pekerjaan = Pekerjaan::where('booknumber', $booknumber)->first();
        $dataAlamat = AreaAlamat::where('kd_area', $pekerjaan->kd_area)->get();
        $dataKeterangan = AreaKeterangan::where('kd_alamat', $dataAlamat->where('kd_alamat', $pekerjaan->kd_alamat)->first()->kd_alamat)->get();
        return view('pemeliharaan/pekerjaan-edit', [
            'pekerjaan' => $pekerjaan,
            'area_klasifikasi' => $area_klasifikasi,
            'pekerjaan_klasifikasi' => $pekerjaan_klasifikasi,
            'dataAlamat' => $dataAlamat,
            'dataKeterangan' => $dataKeterangan
        ]);
    }

    public function update($booknumber, request $request)
    {
        $nama = $request->nama;
        $nik = $request->nik;
        $telepon = $request->telepon;
        $uraian = $request->uraian;
        $kd_area = $request->kd_area;
        $kd_alamat = $request->kd_alamat;
        $kd_keterangan = $request->kd_keterangan;
        $kd_klasifikasi_pekerjaan = $request->kd_klasifikasi_pekerjaan;


        $pekerjaan = Pekerjaan::where('booknumber', $booknumber)->first();
        $pekerjaan->nama = $nama;
        $pekerjaan->nik = $nik;
        $pekerjaan->telepon = $telepon;
        $pekerjaan->uraian = $uraian;
        $pekerjaan->status = 'Requested';
        $pekerjaan->kd_area = $kd_area;
        $pekerjaan->kd_alamat = $kd_alamat;
        $pekerjaan->kd_keterangan = $kd_keterangan;
        $pekerjaan->kd_klasifikasi_pekerjaan = $kd_klasifikasi_pekerjaan;
        $pekerjaan->save();

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

        return redirect('pemeliharaan/pekerjaan-detail/' . $pekerjaan->booknumber)->with('update', 'Data berhasil diupdate.');
    }

    public function deleteFile($id)
    {
        $getFile = PekerjaanFile::where('id', $id)->first();
        $getFile->delete();
        unlink(public_path('pemeliharaan/') . $getFile->file);

        return redirect()->back();
    }
}
