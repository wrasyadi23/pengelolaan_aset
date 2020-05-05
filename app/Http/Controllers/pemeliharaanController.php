<?php

namespace App\Http\Controllers;

use App\AreaAlamat;
use App\AreaKeterangan;
use App\AreaKlasifikasi;
use App\PekerjaanFile;
use App\PekerjaanKlasifikasi;
use App\Pekerjaan;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

class pemeliharaanController extends Controller
{
    public function index(){
        return view('pemeliharaan/dashboard');
    }

    public function data()
    {
        $pekerjaan = Pekerjaan::all();
        return view('pemeliharaan/data',[
            'pekerjaan' => $pekerjaan,
        ]);
    }
}
