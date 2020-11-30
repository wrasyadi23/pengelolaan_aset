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
    }
}
