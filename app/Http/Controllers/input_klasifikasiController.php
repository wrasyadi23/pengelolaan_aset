<?php

namespace App\Http\Controllers;

use App\Bagian;
use App\Seksi;
use App\Regu;
use App\PekerjaanKlasifikasi;
use Illuminate\Http\Request;

class input_klasifikasiController extends Controller
{
    public function index() {
        $klasifikasi_pekerjaan = PekerjaanKlasifikasi::orderBy('id','desc')->paginate(10);
        return view('pemeliharaan/klasifikasi',['klasifikasi_pekerjaan' => $klasifikasi_pekerjaan]);
    }

    public function create() 
    {
        $bagian = Bagian::all();
        return view('pemeliharaan/klasifikasi-create',['bagian' => $bagian]);
    }

    public function store(Request $request)
    {
        // get kd_klasifikasi_pekerjaan
        $data = PekerjaanKlasifikasi::select('id','kd_klasifikasi_pekerjaan')
            ->orderBy('id', 'desc')->count();
        if ($data > 0) {
            $kd_klasifikasi_pekerjaan = 'KP' . sprintf('%04s', $data + 1);
        } else {
            $kd_klasifikasi_pekerjaan = 'KP' . sprintf('%04s', 1);
        }
        
        $klasifikasi_pekerjaan = $request->input('klasifikasi_pekerjaan');
        $kd_regu = $request->input('kd_regu');

        $klasifikasi = new PekerjaanKlasifikasi;
        $klasifikasi->kd_klasifikasi_pekerjaan = $kd_klasifikasi_pekerjaan;
        $klasifikasi->klasifikasi_pekerjaan = $klasifikasi_pekerjaan;
        $klasifikasi->kd_regu = $kd_regu;
        $klasifikasi->save();

        return redirect('pemeliharaan/klasifikasi')->with('message','Klasifikasi Pekerjaan baru telah tersimpan.');
    }

    public function edit($id)
    {
        $bagian = Bagian::all();
        // get data existing
        $klasifikasi = PekerjaanKlasifikasi::where('id',$id)->first();
        $dataRegu = Regu::where('kd_regu',$klasifikasi->kd_regu)->first();
        $dataSeksi = Seksi::where('kd_seksi', $dataRegu->kd_seksi)->first();
        $dataBagian = Bagian::where('kd_bagian', $dataSeksi->kd_bagian)->first();
        return view('pemeliharaan/klasifikasi-edit',[
            'bagian' => $bagian,
            'klasifikasi' => $klasifikasi,
            'dataRegu' => $dataRegu,
            'dataSeksi' => $dataSeksi,
            'dataBagian' => $dataBagian
        ]);
    }

    public function update($id, Request $request)
    {
        $klasifikasi_pekerjaan = $request->input('klasifikasi_pekerjaan');
        $kd_regu = $request->input('kd_regu');
    
        $klasifikasi = PekerjaanKlasifikasi::where('id',$id)->first();
        $klasifikasi->klasifikasi_pekerjaan = $klasifikasi_pekerjaan;
        $klasifikasi->kd_regu = $kd_regu;
        $klasifikasi->save();

        return redirect('pemeliharaan/klasifikasi')->with('message','Data berhasil diupdate.');
    }

    public function delete($id)
    {
        $klasifikasi = PekerjaanKlasifikasi::where('id',$id)->first();
        $klasifikasi->delete();
        
        return redirect()->back();
    }
}
