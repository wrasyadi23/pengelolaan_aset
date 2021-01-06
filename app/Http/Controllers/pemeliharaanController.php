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
       if (Auth::user()->role == 'Admin') {
            $pekerjaan = Pekerjaan::all();

            $chartX = [];
            $chartY = [];

            foreach ($pekerjaan as $data) {
                $chartX = $data->status;
                $chartY = $data->where('status', $chartX)->count();
            }
        }

        elseif (Auth::user()->role == 'Worker') {
            $pekerjaan = Pekerjaan::where(
                'kd_klasifikasi_pekerjaan', Auth::user()->getKaryawan->getRegu->getKlasifikasi->map->only('kd_klasifikasi_pekerjaan')
            )->with('getKlasifikasi')->get();
        }

        else {
            $pekerjaan = Pekerjaan::where('created_by', Auth::user()->nik)
            ->orderBy('booknumber', 'desc')
            ->get();
        }

        // dd($chartY);

        return view('pemeliharaan/dashboard', [
            'pekerjaan' => $pekerjaan,
            'chartX' => $chartX,
            'chartY' => $chartY,
        ]);
    }

    public function data()
    {
        $pekerjaan = Pekerjaan::where('created_by',Auth::user()->nik)->get();
        return view('pemeliharaan/data',[
            'pekerjaan' => $pekerjaan,
        ]);
    }
}
