<?php

namespace App\Http\Controllers;
use App\Kontrak;
use App\KontrakBA;
use App\HargaSewa;
use Illuminate\Http\Request;

class TarifSewaEsdController extends Controller
{
    public function tampiltarif(){
        $getTarifEsd = HargaSewa::orderBy('id', 'desc')->paginate(10);
        return view('transport/sewa-tarif-tampil', ['getTarifEsd' => $getTarifEsd]);
    }

    public function create(){
        $rawDataBA = KontrakBA::orderBy('id', 'desc')->get();
        return view('transport/sewa-tarif-create', [
            'rawDataBA' => $rawDataBA
            ]);
    }

    public function store(Request $request)
    {
        $data = HargaSewa::select('id', 'kd_tarif')
        ->orderBy('id', 'desc')->count();
        if ($data > 0) {
            $kendaraan = 'TARIF' .  sprintf('%04s', $data + 1);
        } else {
            $kendaraan = 'TARIF' .  sprintf('%04s', 1);
        }
        $kd_tarif = $request->input('kd_tarif');
        $klasifikasi_tarif = $request->input('klasifikasi_tarif');
        $merk = $request->input('merk');
        $type = $request->input('type');
        $jenis_kend = $request->input('jenis_kend');
        $harga = $request->input('harga');
        $kd_ba = $request->input('kd_ba');
        
        $newRealisasi = new HargaSewa();
        $newRealisasi->kd_tarif = $kendaraan;
        $newRealisasi->klasifikasi_tarif = $klasifikasi_tarif;
        $newRealisasi->merk = $merk;
        $newRealisasi->type = $type;
        $newRealisasi->jenis_kend = $jenis_kend;
        $newRealisasi->harga = $harga;
        $newRealisasi->kd_ba = $kd_ba;
        $newRealisasi->save();
        
        return redirect('transport/sewa-tarif-tampil');
    }

    public function cari(Request $data){
        $key = $data->key;
        $getTarifEsd = HargaSewa::where('klasifikasi_tarif','like',"%".$key."%")
        ->paginate(10);
        return view('transport/sewa-tarif-tampil', ['getTarifEsd' => $getTarifEsd]);
    }

    public function edit($kd_tarif)
    {
        $edittarif = HargaSewa ::where('kd_tarif', $kd_tarif)->first();
        return view('transport/sewa-tarif-edit', ['edittarif' => $edittarif]);
    }

    public function update($id, Request $request)
    {
        $klasifikasi_tarif = $request->input('klasifikasi_tarif');
        $merk = $request->input('merk');
        $type = $request->input('type');
        $jenis_kend = $request->input('jenis_kend');
        $harga = $request->input('harga');
        
        $newRealisasi = HargaSewa::findOrFail($id);
        $newRealisasi->klasifikasi_tarif = $klasifikasi_tarif;
        $newRealisasi->merk = $merk;
        $newRealisasi->type = $type;
        $newRealisasi->jenis_kend = $jenis_kend;
        $newRealisasi->harga = $harga;
        $newRealisasi->save();
        
        return redirect('transport/sewa-tarif-tampil');
    }
}
