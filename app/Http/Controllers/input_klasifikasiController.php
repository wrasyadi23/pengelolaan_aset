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
        return view('pemeliharaan/klasifikasi');
    }

    public function create() 
    {
        $bagian = Bagian::all();
        return view('pemeliharaan/klasifikasi-create',['bagian' => $bagian]);
    }
}
