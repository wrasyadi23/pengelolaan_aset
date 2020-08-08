<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\Rkap;
use App\RkapDetail;
use App\Uangmuka;
use Auth;
use File;
use Carbon\Carbon;

class uangmukaController extends Controller
{
    public function index()
    {
        $rawDataUM = Uangmuka::all();
        return view('transport/uangmuka', $rawDataUM);
    }
    public function create()
    {
        $karyawan = Karyawan::all();
        $rkap = Rkap::all();

        return view('transport/uangmuka-create', [
            'karyawan' => $karyawan,
            'rkap' => $rkap,
        ]);
    }
}
