<?php

namespace App\Http\Controllers;
use App\Kontrak;
use App\KontrakBA;
use App\Kendaraan;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function create(){
        $rawDataBA = KontrakBA::orderBy('id', 'desc')->get();
        return view('transport/kendaraan-create', [
            'rawDataBA' => $rawDataBA
            ]);
        }

    public function store(Request $request)
    {
        $data = Kendaraan::select('id', 'kd_kendaraan')
        ->orderBy('id', 'desc')->count();
        if ($data > 0) {
            $kd_kendaraan = 'KEND' .  sprintf('%05s', $data + 1);
        } else {
            $kd_kendaraan = 'KEND' .  sprintf('%05s', 1);
        }
        
        $nopol = $request->input('nopol');
        $merk = $request->input('merk');
        $type = $request->input('type');
        $tahun = $request->input('tahun');
        $warna = $request->input('warna');
        $jenis = $request->input('jenis');
        $jenis_bbm = $request->input('jenis_bbm');
        $jml_bbm = $request->input('jml_bbm');
        $no_bpkb = $request->input('no_bpkb');
        $no_stnk = $request->input('no_stnk');
        $no_mesin = $request->input('no_mesin');
        $no_rangka = $request->input('no_rangka');
        $status = $request->input('status');
        $kd_ba = $request->input('kd_ba');
        $kd_departemen = $request->input('kd_departemen');
        $kd_bagian = $request->input('kd_bagian');
        $kd_seksi = $request->input('kd_seksi');
        $kd_regu = $request->input('kd_regu');
        
        $kendaraan = new Kendaraan;
        $kendaraan->kd_kendaraan = $kd_kendaraan;
        $kendaraan->nopol = $nopol;
        $kendaraan->merk = $merk;
        $kendaraan->type = $type;
        $kendaraan->tahun = $tahun;
        $kendaraan->warna = $warna;
        $kendaraan->jenis = $jenis;
        $kendaraan->jenis_bbm = $jenis_bbm;
        $kendaraan->jml_bbm = $jml_bbm;
        $kendaraan->no_bpkb = $no_bpkb;
        $kendaraan->no_stnk = $no_stnk;
        $kendaraan->no_mesin = $no_mesin;
        $kendaraan->no_rangka = $no_rangka;
        $kendaraan->status = 'Aktif';
        $kendaraan->kd_ba = $kd_ba;
        $kendaraan->kd_departemen = '-';
        $kendaraan->kd_bagian = '-';
        $kendaraan->kd_seksi = '-';
        $kendaraan->kd_regu = '-';
        $kendaraan->save();
        
        return redirect('transport/kendaraan-create');
    }
}
