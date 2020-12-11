<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kontrak;
use App\KontrakBA;
use App\HargaSewa;
use Auth;
use Carbon\Carbon;

class HargaSewaController extends Controller
{
    public function index()
    {
        $hargasewa = HargaSewa::all();
        return view('transport/harga-sewa', [
            'hargasewa' => $hargasewa,
        ]);
    }

    public function create()
    {
        $kontrakba = KontrakBA::all();
        return view('transport/harga-sewa-create', [
            'kontrakba' => $kontrakba,
        ]);
    }

    public function store(request $request)
    {
        $data = HargaSewa::select('id', 'kd_tarif')
            ->orderBy('id', 'desc')->count();
        $tahun_sekarang = date('Ym');
        if ($data > 0) {
            $kd_tarif = 'KT' . $tahun_sekarang . sprintf('%05s', $data + 1);
        } else {
            $kd_tarif = 'KT' . $tahun_sekarang . sprintf('%05s', 1);
        }

        $klasifikasi_tarif = $request->klasifikasi_tarif;
        $merk = $request->merk;
        $type = $request->type;
        $jenis_kend = $request->jenis_kend;
        $harga = $request->harga;
        $kd_ba = $request->kd_ba;

        $newhargasewa = new HargaSewa;
        $newhargasewa->kd_tarif = $kd_tarif;
        $newhargasewa->klasifikasi_tarif = $klasifikasi_tarif;
        $newhargasewa->merk = $merk;
        $newhargasewa->type = $type;
        $newhargasewa->jenis_kend = $jenis_kend;
        $newhargasewa->harga = $harga;
        $newhargasewa->kd_ba = $kd_ba;
        $newhargasewa->save();

        return redirect('transport/harga-sewa')->with('message-success', 'Data berhasil disimpan.');
    }

    public function edit($kd_tarif)
    {
        $kontrakba = KontrakBA::all();

        // ambil data eksisting
        $hargasewa = HargaSewa::where('kd_tarif', $kd_tarif)->first();

        return view('transport/harga-sewa-edit', [
            'kontrakba' => $kontrakba,
            'hargasewa' => $hargasewa,
        ]);
    }

    public function update($kd_tarif, request $request)
    {
        $klasifikasi_tarif = $request->klasifikasi_tarif;
        $merk = $request->merk;
        $type = $request->type;
        $jenis_kend = $request->jenis_kend;
        $harga = $request->harga;
        $kd_ba = $request->kd_ba;

        $updatehargasewa = HargaSewa::where('kd_tarif', $kd_tarif)->first();
        $updatehargasewa->klasifikasi_tarif = $klasifikasi_tarif;
        $updatehargasewa->merk = $merk;
        $updatehargasewa->type = $type;
        $updatehargasewa->jenis_kend = $jenis_kend;
        $updatehargasewa->harga = $harga;
        $updatehargasewa->kd_ba = $kd_ba;
        $updatehargasewa->save();

        return redirect('transport/harga-sewa')->with('message-success-update', 'Data berhasil diupdate.');
    }
}
