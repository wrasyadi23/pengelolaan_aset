<?php

namespace App\Http\Controllers;
use App\Kontrak;
use App\KontrakBA;
use App\Kendaraan;
use App\Departemen;
use App\KendaraanHistory;
use App\Bagian;
use App\Seksi;
use App\Regu;
use Auth;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function create(){
        $departemen = Departemen::all();
        $rawDataBA = KontrakBA::orderBy('id', 'desc')->get();
        return view('transport/kendaraan-create', [
            'rawDataBA' => $rawDataBA,
            'departemen' => $departemen,
            ]);
        }

    public function store(Request $request)
    {
        $data = Kendaraan::select('id', 'kd_kendaraan')
        ->orderBy('id', 'desc')->count();
        if ($data > 0) {
            $kendaraan = 'KEND' .  sprintf('%04s', $data + 1);
        } else {
            $kendaraan = 'KEND' .  sprintf('%04s', 1);
        }
        $nopol = $request->input('nopol');
        $merk = $request->input('merk');
        $type = $request->input('type');
        $tahun = $request->input('tahun');
        $warna = $request->input('warna');
        $jenis_kend = $request->input('jenis_kend');
        $jenis_bbm = $request->input('jenis_bbm');
        $jml_bbm = $request->input('jml_bbm');
        $no_bpkb = $request->input('no_bpkb');
        $no_stnk = $request->input('no_stnk');
        $no_mesin = $request->input('no_mesin');
        $no_rangka = $request->input('no_rangka');
        $jenis_sewa = $request->input('jenis_sewa');
        $status = $request->input('status');
        $kd_ba = $request->input('kd_ba');
        $kd_departemen = $request->input('kd_departemen');
        $kd_bagian = $request->input('kd_bagian');
        $kd_seksi = $request->input('kd_seksi');
        $kd_regu = $request->input('kd_regu');
        
        $newRealisasi = new Kendaraan();
        $newRealisasi->kd_kendaraan = $kendaraan;
        $newRealisasi->nopol = $nopol;
        $newRealisasi->merk = $merk;
        $newRealisasi->type = $type;
        $newRealisasi->tahun = $tahun;
        $newRealisasi->warna = $warna;
        $newRealisasi->jenis_kend = $jenis_kend;
        $newRealisasi->jenis_bbm = $jenis_bbm;
        $newRealisasi->jml_bbm = $jml_bbm;
        $newRealisasi->no_bpkb = $no_bpkb;
        $newRealisasi->no_stnk = $no_stnk;
        $newRealisasi->no_mesin = $no_mesin;
        $newRealisasi->no_rangka = $no_rangka;
        $newRealisasi->jenis_sewa = $jenis_sewa;
        $newRealisasi->status = 'Aktif';
        $newRealisasi->kd_ba = $kd_ba;
        $newRealisasi->kd_departemen = $kd_departemen;
        $newRealisasi->kd_bagian = $kd_bagian;
        $newRealisasi->kd_seksi = $kd_seksi;
        $newRealisasi->kd_regu = $kd_regu;
        $newRealisasi->save();

        $newRealisasi = new KendaraanHistory();
        $newRealisasi->kd_kendaraan = $kendaraan;
        $newRealisasi->nopol = $nopol;
        $newRealisasi->merk = $merk;
        $newRealisasi->type = $type;
        $newRealisasi->tahun = $tahun;
        $newRealisasi->warna = $warna;
        $newRealisasi->jenis_kend = $jenis_kend;
        $newRealisasi->jenis_bbm = $jenis_bbm;
        $newRealisasi->jml_bbm = $jml_bbm;
        $newRealisasi->no_bpkb = $no_bpkb;
        $newRealisasi->no_stnk = $no_stnk;
        $newRealisasi->no_mesin = $no_mesin;
        $newRealisasi->no_rangka = $no_rangka;
        $newRealisasi->jenis_sewa = $jenis_sewa;
        $newRealisasi->status = 'Aktif';
        $newRealisasi->kd_ba = $kd_ba;
        $newRealisasi->kd_departemen = $kd_departemen;
        $newRealisasi->kd_bagian = $kd_bagian;
        $newRealisasi->kd_seksi = $kd_seksi;
        $newRealisasi->kd_regu = $kd_regu;
        $newRealisasi->save();
        
        return redirect('transport/kendaraan-create');
    }

    public function tampilkend(){
        $kendaraan = Kendaraan::orderBy('id', 'desc')
        ->where('status', '=', 'Aktif')
        ->where('jenis_sewa', '=', 'SewaSP')
        ->get();
        return view('transport/kendaraan-tampil', ['kendaraan' => $kendaraan]);
    }

    public function cari1(Request $data)
   {
    $key = $data->key;
    $kendaraan =  Kendaraan::where([
            ['nopol', 'like', "%" . $key . "%"],
            ['status', '=', 'Aktif']
        ])
        ->paginate(10);
        return view('transport/kendaraan-tampil', ['kendaraan' => $kendaraan]);
   }

   public function edit($id)
   {
    $editkend = Kendaraan::where('id',$id)->first();
    return view('transport/kendaraan-edit', ['editkend' => $editkend]);
   }

    public function update($id, Request $request)
    {
        $nopol = $request->input('nopol');
        $merk = $request->input('merk');
        $type = $request->input('type');
        $tahun = $request->input('tahun');
        $warna = $request->input('warna');
        $jenis = $request->input('jenis');
        $jenis_bbm = $request->input('jenis_bbm');
        $jml_bbm = $request->input('jml_bbm');
        $no_mesin = $request->input('no_mesin');
        $no_rangka = $request->input('no_rangka');
        $status = $request->input('status');
        $kd_departemen = $request->input('kd_departemen');
        $kd_bagian = $request->input('kd_bagian');
        
        $newRealisasi = Kendaraan::findOrFail($id);
        $newRealisasi->nopol = $nopol;
        $newRealisasi->merk = $merk;
        $newRealisasi->type = $type;
        $newRealisasi->tahun = $tahun;
        $newRealisasi->warna = $warna;
        $newRealisasi->jenis = $jenis;
        $newRealisasi->jenis_bbm = $jenis_bbm;
        $newRealisasi->jml_bbm = $jml_bbm;
        $newRealisasi->no_mesin = $no_mesin;
        $newRealisasi->no_rangka = $no_rangka;
        $newRealisasi->status = $status;
        $newRealisasi->kd_departemen = $kd_departemen;
        $newRealisasi->kd_bagian = $kd_bagian;
        $newRealisasi->save();
        
        return redirect('transport/kendaraan-tampil');
    }
    
}
