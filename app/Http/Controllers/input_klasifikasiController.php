<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class input_klasifikasiController extends Controller
{
    public function index() {
        return view('pemeliharaan/klasifikasi');
    }
}
