<?php

namespace App\Http\Controllers;

use App\Parkirtol;
use App\ParkirtolDetail;
use App\Uangmuka;
use App\Pengemudi;
use Carbon\Carbon;
use File;
use Auth;
use Illuminate\Http\Request;

class parkirtolController extends Controller
{
    public function index()
    {
        $parkirtol = Parkirtol::where('status','Requested')->get();
        return view('transport/parkirtol',[
            'parkirtol' => $parkirtol,
        ]);
    }

    public function create()
    {
        $uangmuka = Uangmuka::where('status','Requested')->get();
        $pengemudi = Pengemudi::where('status','Aktif')->get();
        return view('transport/parkirtol-create', [
            'uangmuka' => $uangmuka,
            'pengemudi' => $pengemudi,
        ]);
    }

    public function store(Request $request)
    {
        // getParkirtol
        $data = Parkirtol::select('id', 'kd_parkirtol')
            ->whereYear('tgl', date('Y'))
            ->orderBy('id', 'desc')->count();
        $tahun_sekarang = date('Ym');
        if ($data > 0) {
            $kd_parkirtol = 'PT' . $tahun_sekarang . sprintf('%05s', $data + 1);
        } else {
            $kd_parkirtol = 'PT' . $tahun_sekarang . sprintf('%05s', 1);
        }

        
    }
}
