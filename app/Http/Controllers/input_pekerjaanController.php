<?php

namespace App\Http\Controllers;

use App\AreaAlamat;
use App\AreaKeterangan;
use App\AreaKlasifikasi;
use App\PekerjaanFile;
use App\PekerjaanKlasifikasi;
use App\PekerjaanKapasitas;
use App\Pekerjaan;
use App\Regu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use File;
use Auth;

class input_pekerjaanController extends Controller
{
    public function index()
    {
        $getDataPekerjaan = Pekerjaan::where('nik', Auth::user()->nik)
            ->whereIn('status', ['Requested', 'Approved'])
            ->get();
        return view('pemeliharaan/pekerjaan', ['DataPekerjaan' => $getDataPekerjaan]);
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

    public function store(Request $request)
    {
        // get book number
        $data = Pekerjaan::select('id', 'booknumber', 'tanggal_pekerjaan')
            ->whereYear('tanggal_pekerjaan', date('Y'))
            ->orderBy('id', 'desc')->count();
        $tahun_sekarang = date('Ym');
        if ($data > 0) {
            $getBookNumber = $tahun_sekarang . sprintf('%05s', $data + 1);
        } else {
            $getBookNumber = $tahun_sekarang . sprintf('%05s', 1);
        }

        $booknumber = $getBookNumber;
        $telepon = $request->input('telepon');
        $kd_area = $request->input('kd_area');
        $kd_alamat = $request->input('kd_alamat');
        $kd_keterangan = $request->input('kd_keterangan');
        $kd_klasifikasi_pekerjaan = $request->input('kd_klasifikasi_pekerjaan');
        $tanggal_pekerjaan = date('Y-m-d h:m:s');
        $uraian = $request->input('uraian');

        $pekerjaanKlasifikasi = PekerjaanKlasifikasi::where('kd_klasifikasi_pekerjaan', $kd_klasifikasi_pekerjaan)->first();
        $filteredKp = PekerjaanKlasifikasi::where('kd_regu', $pekerjaanKlasifikasi->kd_regu)->select('kd_klasifikasi_pekerjaan')->get()->toArray();

        $validasi_tanggal_pelaksanaan = Pekerjaan::select('id', 'kd_klasifikasi_pekerjaan', 'tanggal_pelaksanaan')->whereIn('kd_klasifikasi_pekerjaan', $filteredKp)->orderBy('id', 'desc')->get();
        if (empty($validasi_tanggal_pelaksanaan)) {
            $tanggal_pelaksanaan = Carbon::now();
        } elseif ( 
            $validasi_tanggal_pelaksanaan
            ->where('tanggal_pelaksanaan', $validasi_tanggal_pelaksanaan->first()->tanggal_pelaksanaan)
            ->count() <
            $validasi_tanggal_pelaksanaan->first()->getKlasifikasi->getRegu->getKapasitas->kapasitas
        ) {
            $tanggal_pelaksanaan = $validasi_tanggal_pelaksanaan->first()->tanggal_pelaksanaan;
        } else {
            $tanggal_pelaksanaan = Carbon::createFromDate($validasi_tanggal_pelaksanaan->first()->tanggal_pelaksanaan)->addDay();
        }

        $pekerjaan = new Pekerjaan;
        $pekerjaan->booknumber = $booknumber;
        $pekerjaan->nama = Auth::user()->nama;
        $pekerjaan->nik = Auth::user()->nik;
        $pekerjaan->telepon = $telepon;
        $pekerjaan->kd_area = $kd_area;
        $pekerjaan->kd_alamat = $kd_alamat;
        $pekerjaan->kd_keterangan = $kd_keterangan;
        $pekerjaan->kd_klasifikasi_pekerjaan = $kd_klasifikasi_pekerjaan;
        $pekerjaan->tanggal_pekerjaan = $tanggal_pekerjaan;
        $pekerjaan->tanggal_pelaksanaan = $tanggal_pelaksanaan;
        $pekerjaan->uraian = $uraian;
        $pekerjaan->status = 'Requested';
        $pekerjaan->save();

        // Operasi simpan foto dipindah kebawah untuk memastikan booknumber telah tersimpan sebelum operasi ke table tb_pekerjaan_file
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

        return redirect('pemeliharaan/pekerjaan')->with('message', 'Data berhasil dimasukkan.');
    }

    public function detail($booknumber)
    {

        $getDetail = Pekerjaan::where('booknumber', $booknumber)->first();
        return view('pemeliharaan/pekerjaan-detail', ['DetailPekerjaan' => $getDetail]);
    }

    public function edit($booknumber)
    {

        $area_klasifikasi = AreaKlasifikasi::all();
        $pekerjaan_klasifikasi = PekerjaanKlasifikasi::all();
        // 3 variable di bawah untuk mengambil data existing
        $getDataPekerjaan = Pekerjaan::where('booknumber', $booknumber)->first();
        $dataAlamat = AreaAlamat::where('kd_area', $getDataPekerjaan->kd_area)->get();
        $dataKeterangan = AreaKeterangan::where('kd_alamat', $dataAlamat->where('kd_alamat', $getDataPekerjaan->kd_alamat)->first()->kd_alamat)->get();
        return view('pemeliharaan/pekerjaan-edit', [
            'DataPekerjaan' => $getDataPekerjaan,
            'area_klasifikasi' => $area_klasifikasi,
            'pekerjaan_klasifikasi' => $pekerjaan_klasifikasi,
            'dataAlamat' => $dataAlamat,
            'dataKeterangan' => $dataKeterangan
        ]);
    }

    public function update($booknumber, request $request)
    {

        $telepon = $request->input('telepon');
        $kd_area = $request->input('kd_area');
        $kd_alamat = $request->input('kd_alamat');
        $kd_keterangan = $request->input('kd_keterangan');
        $kd_klasifikasi_pekerjaan = $request->input('kd_klasifikasi_pekerjaan');
        $uraian = $request->input('uraian');

        $pekerjaan = Pekerjaan::where('booknumber', $booknumber)->first();
        $pekerjaan->telepon = $telepon;
        $pekerjaan->kd_area = $kd_area;
        $pekerjaan->kd_alamat = $kd_alamat;
        $pekerjaan->kd_keterangan = $kd_keterangan;
        $pekerjaan->kd_klasifikasi_pekerjaan = $kd_klasifikasi_pekerjaan;
        $pekerjaan->save();

        // Operasi simpan foto dipindah kebawah untuk memastikan booknumber telah tersimpan sebelum operasi ke table tb_pekerjaan_file
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

        return redirect('pemeliharaan/pekerjaan-detail/' . $pekerjaan->booknumber)->with('message', 'Data berhasil diupdate.');
    }

    public function approve($booknumber)
    {

        $approvePekerjaan = Pekerjaan::where('booknumber', $booknumber)->first();
        $approvePekerjaan->status = 'Approved';
        $approvePekerjaan->save();

        return redirect('pemeliharaan/pekerjaan')->with('message', 'Pekerjaan telah disetujui.');
    }

    public function cancel($booknumber)
    {

        $cancelPekerjaan = Pekerjaan::where('booknumber', $booknumber)->first();
        $cancelPekerjaan->status = 'Canceled';
        $cancelPekerjaan->save();

        return redirect('pemeliharaan/pekerjaan')->with('message', 'Pekerjaan telah dicancel.');
    }

    public function close($booknumber)
    {

        $closePekerjaan = Pekerjaan::where('booknumber', $booknumber)->first();
        $closePekerjaan->status = 'Closed';
        $closePekerjaan->save();

        return redirect('pemeliharaan/pekerjaan')->with('message', 'Pekerjaan telah selesai.');
    }

    public function deleteFile($id)
    {

        $getFile = PekerjaanFile::where('id', $id)->first();
        $getFile->delete();
        unlink(public_path('pemeliharaan/') . $getFile->file);

        return redirect()->back();
    }

    public function disapprove($booknumber)
    {

        $disapprovePekerjaan = Pekerjaan::where('booknumber', $booknumber)->first();
        $disapprovePekerjaan->status = 'Requested';
        $disapprovePekerjaan->save();

        return redirect('pemeliharaan/pekerjaan-detail/' . $disapprovePekerjaan->booknumber)->with('message', 'Data telah diupdate.');
    }
}
