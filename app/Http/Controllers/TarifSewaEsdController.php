<?php

namespace App\Http\Controllers;
use App\TarifSewaEsd;
use App\Kontrak;
use App\KontrakBA;
use Illuminate\Http\Request;

class TarifSewaEsdController extends Controller
{
    public function tampiltarif(){
        $getTarifEsd = TarifSewaEsd::orderBy('id', 'desc')->paginate(10);
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
        $data = TarifSewaEsd::select('id', 'kd_tarif')
        ->orderBy('id', 'desc')->count();
        if ($data > 0) {
            $kendaraan = 'TARIF' .  sprintf('%04s', $data + 1);
        } else {
            $kendaraan = 'TARIF' .  sprintf('%04s', 1);
        }
        $kd_tarif = $request->input('kd_tarif');
        $klasifiksai_tarif = $request->input('klasifiksai_tarif');
        $merk = $request->input('merk');
        $type = $request->input('type');
        $jenis_kend = $request->input('jenis_kend');
        $harga = $request->input('harga');
        $kd_ba = $request->input('kd_ba');
        
        $newRealisasi = new TarifSewaEsd();
        $newRealisasi->kd_tarif = $kendaraan;
        $newRealisasi->klasifiksai_tarif = $klasifiksai_tarif;
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
        $getTarifEsd = TarifSewaEsd::where('klasifiksai_tarif','like',"%".$key."%")
        ->paginate(10);
        return view('transport/sewa-tarif-tampil', ['getTarifEsd' => $getTarifEsd]);
    }

    public function edit($kd_tarif)
    {
        $edittarif = TarifSewaEsd ::where('kd_tarif', $kd_tarif)->first();
        return view('transport/sewa-tarif-edit', ['edittarif' => $edittarif]);
    }

    public function update($id, Request $request)
    {
        $klasifiksai_tarif = $request->input('klasifiksai_tarif');
        $merk = $request->input('merk');
        $type = $request->input('type');
        $jenis_kend = $request->input('jenis_kend');
        $harga = $request->input('harga');
        
        $newRealisasi = TarifSewaEsd::findOrFail($id);
        $newRealisasi->klasifiksai_tarif = $klasifiksai_tarif;
        $newRealisasi->merk = $merk;
        $newRealisasi->type = $type;
        $newRealisasi->jenis_kend = $jenis_kend;
        $newRealisasi->harga = $harga;
        $newRealisasi->save();
        
        return redirect('transport/sewa-tarif-tampil');
    }
}
