<?php

namespace App\Http\Controllers;
use App\SpSewa;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpSewaController extends Controller
{
    public function spsewa(){
        return view('transport/spsewa');
    }
    
    public function store(Request $request)
    {
        $data = SpSewa::select('id', 'kd_sp', 'tgl')
            ->whereYear('tgl', date('Y'))
            ->orderBy('id', 'desc')->count();
        $tahun_sekarang = date('Ym');
        if ($data > 0) {
            $getkdsp = 'SP' . $tahun_sekarang . sprintf('%05s', $data + 1);
        } else {
            $getkdsp = 'SP' . $tahun_sekarang . sprintf('%05s', 1);
        }


        $no_sp = $request->input('no_sp');
        $cost_center = $request->input('cost_center');
        $gl_acc = $request->input('gl_acc');
        $deskripsi = $request->input('deskripsi');
        $uraian = $request->input('uraian');
        $keterangan = $request->input('keterangan');
        $tgl = $request->input('tgl');
        $jenis = $request->input('jenis');
        $harga = $request->input('harga');
        $jml = $request->input('jml');
        $satuan = $request->input('satuan');
        $rekanan = $request->input('rekanan');
        
        $newRealisasi = new SpSewa();
        $newRealisasi->kd_sp = $getkdsp;
        $newRealisasi->no_sp = $no_sp;
        $newRealisasi->cost_center = $cost_center;
        $newRealisasi->gl_acc = $gl_acc;
        $newRealisasi->kd_aktifitas_rkap = '123';
        $newRealisasi->deskripsi = $deskripsi;
        $newRealisasi->uraian = $uraian;
        $newRealisasi->keterangan = $keterangan;
        $newRealisasi->tgl = $tgl;
        $newRealisasi->jenis = $jenis;
        $newRealisasi->harga = $harga;
        $newRealisasi->jml = $jml;
        $newRealisasi->satuan = $satuan;
        $newRealisasi->rekanan = $rekanan;
        $newRealisasi->status = 'Requested';
        $newRealisasi->save();
        
        return redirect('transport/tampilsp');
    }

    
    
    
    public function edit_sp($id)
    {
        $editsp = SpSewa::where('id', $id)->first();
        return view('transport/edit_sp',['editsp' => $editsp]);
    }
    
    public function update($id, Request $request)
    {
        $no_sp = $request->input('no_sp');
        $cost_center = $request->input('cost_center');
        $gl_acc = $request->input('gl_acc');
        $deskripsi = $request->input('deskripsi');
        $uraian = $request->input('uraian');
        $keterangan = $request->input('keterangan');
        $tgl = $request->input('tgl');
        $jenis = $request->input('jenis');
        $harga = $request->input('harga');
        $jml = $request->input('jml');
        $satuan = $request->input('satuan');
        $rekanan = $request->input('rekanan');
        
        $newRealisasi = SpSewa::findOrFail($id);
        $newRealisasi->no_sp = $no_sp;
        $newRealisasi->cost_center = $cost_center;
        $newRealisasi->gl_acc = $gl_acc;
        $newRealisasi->kd_aktifitas_rkap = '123';
        $newRealisasi->deskripsi = $deskripsi;
        $newRealisasi->uraian = $uraian;
        $newRealisasi->keterangan = $keterangan;
        $newRealisasi->tgl = $tgl;
        $newRealisasi->jenis = $jenis;
        $newRealisasi->harga = $harga;
        $newRealisasi->jml = $jml;
        $newRealisasi->satuan = $satuan;
        $newRealisasi->rekanan = $rekanan;
        $newRealisasi->status = 'Requested';
        $newRealisasi->save();
        
        return redirect('transport/tampilsp');   
    }
        public function tampilsp(){
            $getspsewa = SpSewa::orderBy('id', 'desc')->paginate(10);
            return view('transport/tampilsp', ['getspsewa' => $getspsewa]);
        }
    
        public function cari(Request $data){
            $key = $data->key;
            $getspsewa = SpSewa::where('no_sp','like',"%".$key."%")
            ->paginate(10);
            return view('transport/tampilsp', ['getspsewa' => $getspsewa]);
        }

        public function ba_kendaraan(){
            return view('transport/basewa');
        }
}
