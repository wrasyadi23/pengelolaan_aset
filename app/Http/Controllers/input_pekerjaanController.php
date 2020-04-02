<?php

namespace App\Http\Controllers;

use App\AreaKlasifikasi;
use Illuminate\Http\Request;

class input_pekerjaanController extends Controller
{
    public function index() {
        return view('pemeliharaan.pekerjaan');
    }

    public function create() {
        $klasifikasi = AreaKlasifikasi::all();
        return view('pemeliharaan.pekerjaan-create', [
            'klasifikasi' => $klasifikasi
        ]);
    }

    public function store(Request $request) {
        
    }
}
