<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AreaKlasifikasi;
use Auth;

class AreaKlasifikasiController extends Controller
{
    public function index()
    {
        $klasifikasi = AreaKlasifikasi::all();
        return view('pemeliharaan/area-klasifikasi', [
            'klasifikasi' => $klasifikasi,
        ]);
    }
}
