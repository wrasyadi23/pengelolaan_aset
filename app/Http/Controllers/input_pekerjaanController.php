<?php

namespace App\Http\Controllers;

use App\AreaKlasifikasi;
use App\PekerjaanKlasifikasi;
use App\Pekerjaan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\File;

class input_pekerjaanController extends Controller
{
    public function index()
    {
        $getDataPekerjaan = Pekerjaan::all();
        return view('pemeliharaan/pekerjaan',['DataPekerjaan' => $getDataPekerjaan]);
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
        $data = Pekerjaan::select('id', 'bookNumber', 'tanggal_pekerjaan')
            ->whereYear('tanggal_pekerjaan', date('Y'))
            ->orderBy('id', 'desc')->count();
        $tahun_sekarang = date('Ym');
        if ($data > 0) {
            $getBookNumber = $tahun_sekarang . sprintf('%05s', $data + 1);
        } else {
            $getBookNumber = $tahun_sekarang . sprintf('%05s', 1);
        }

        $bookNumber = $getBookNumber;
        $nama = $request->input('nama');
        $nik = $request->input('nik');
        $kd_area = $request->input('kd_area');
        $kd_alamat = $request->input('kd_alamat');
        $kd_keterangan = $request->input('kd_keterangan');
        $kd_klasifikasi_pekerjaan = $request->input('kd_klasifikasi_pekerjaan');
        $tanggal_pekerjaan = date('Y-m-d h:m:s');
        $uraian = $request->input('uraian');
        if ($request->hasFile('foto')) {
            $request->file('foto')->move(public_path('pemeliharaan'), $request->file('foto')->getClientOriginalName());
        }

        $validasi_tanggal_pelaksanaan = Pekerjaan::select('id', 'tanggal_pelaksanaan')->orderBy('id', 'desc')->first();
        if (empty($validasi_tanggal_pelaksanaan)) {
            $tanggal_pelaksanaan = Carbon::now();
        } elseif ($validasi_tanggal_pelaksanaan->where('tanggal_pelaksanaan', $validasi_tanggal_pelaksanaan->tanggal_pelaksanaan)->count() < 5) {
            $tanggal_pelaksanaan = $validasi_tanggal_pelaksanaan->tanggal_pelaksanaan;
        } else {
            $tanggal_pelaksanaan = Carbon::createFromDate($validasi_tanggal_pelaksanaan->tanggal_pelaksanaan)->addDay();
        }

        $pekerjaan = new Pekerjaan;
        $pekerjaan->booknumber = $bookNumber;
        $pekerjaan->nama = 'Mohammad Wava';
        $pekerjaan->nik = '2115446';
        $pekerjaan->kd_area = $kd_area;
        $pekerjaan->kd_alamat = $kd_alamat;
        $pekerjaan->kd_keterangan = $kd_keterangan;
        $pekerjaan->kd_klasifikasi_pekerjaan = $kd_klasifikasi_pekerjaan;
        $pekerjaan->tanggal_pekerjaan = $tanggal_pekerjaan;
        $pekerjaan->tanggal_pelaksanaan = $tanggal_pelaksanaan;
        $pekerjaan->uraian = $uraian;
        $pekerjaan->file = $request->file('foto')->getClientOriginalName();
        $pekerjaan->status = 'Requested';
        $pekerjaan->save();

        return redirect('pemeliharaan/pekerjaan')->with('message', 'Data berhasil dimasukkan.');
    }

    public function detail($booknumber) {
        
        $getDetail = Pekerjaan::where('booknumber',$booknumber)->first();
        return view('pemeliharaan/pekerjaan-detail',['DetailPekerjaan' => $getDetail]);
    }

    public function edit($booknumber) {

        $area_klasifikasi = AreaKlasifikasi::all();
        $pekerjaan_klasifikasi = PekerjaanKlasifikasi::all();
        $getDataPekerjaan = Pekerjaan::where('booknumber',$booknumber)->first();
        return view('pemeliharaan/pekerjaan-edit', [
            'DataPekerjaan' => $getDataPekerjaan,
            'area_klasifikasi' => $area_klasifikasi,
            'pekerjaan_klasifikasi' => $pekerjaan_klasifikasi
        ]);
    }

    public function update($booknumber, request $request) {


    }

    public function approve($booknumber) {

        $approvePekerjaan = Pekerjaan::where('booknumber',$booknumber)->first();
        $approvePekerjaan->status = 'Approved';
        $approvePekerjaan->save();

        return redirect('pemeliharaan/pekerjaan')->with('message', 'Pekerjaan telah disetujui.');        
    }

    public function cancel($booknumber) {

        $cancelPekerjaan = Pekerjaan::where('booknumber',$booknumber)->first();
        $cancelPekerjaan->status = 'Canceled';
        $cancelPekerjaan->save();

        return redirect('pemeliharaan/pekerjaan')->with('message', 'Pekerjaan telah dicancel.');
    }

    public function deleteFile($booknumber) {

        $getFile = Pekerjaan::where('booknumber',$booknumber)->first();
        File::delete(public_path('pemeliharaan'), $getFile->file);

        return redirect()->back();
    }
}
