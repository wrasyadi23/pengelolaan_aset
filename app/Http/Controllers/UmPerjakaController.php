<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\Rkap;
use App\RkapDetail;
use App\Uangmuka;
use App\WUM;
use Auth;
use File;
use PDF;
use Carbon\Carbon;

class umperjakaController extends Controller
{
    public function index()
    {
       $umperjaka = Uangmuka::orderBy('id', 'desc')
       ->where('status', '=', 'Requested')
       ->get();
        return view('transport/umperjaka', ['umperjaka' => $umperjaka]);
    }
    public function create()
    {
        $karyawan = Karyawan::all();
        $rkapDetail = RkapDetail::all();

        return view('transport/umperjaka-create', compact('karyawan','rkapDetail'));
    }

    public function store(Request $request)
    {
        $data = Uangmuka::select('id', 'kd_uangmuka', 'tgl')
            ->whereYear('tgl', date('Y'))
            ->orderBy('id', 'desc')->count();
        $tahun_sekarang = date('Ym');
        if ($data > 0) {
            $kd_uangmuka = 'UM' . $tahun_sekarang . sprintf('%05s', $data + 1);
        } else {
            $kd_uangmuka = 'UM' . $tahun_sekarang . sprintf('%05s', 1);
        }

        $no_uangmuka = $request->no_uangmuka;
        // $tgl = Carbon::today()->format('L');
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        $uraian = $request->uraian;
        $nilai_uangmuka = $request->nilai_uangmuka;
        $nik = $request->nik;
        $kd_aktifitas_rkap = $request->kd_aktifitas_rkap;

        
            $newUangmuka = new Uangmuka;
            $newUangmuka->kd_uangmuka = $kd_uangmuka;
            $newUangmuka->no_uangmuka = $no_uangmuka;
            $newUangmuka->tgl = date('Y-m-d');
            $newUangmuka->tgl_awal = $tgl_awal;
            $newUangmuka->tgl_akhir = $tgl_akhir;
            $newUangmuka->uraian = $uraian;
            $newUangmuka->nilai_uangmuka = $nilai_uangmuka;
            $newUangmuka->status = 'Requested';
            $newUangmuka->nik = $nik;
            $newUangmuka->kd_aktifitas_rkap = $kd_aktifitas_rkap;
            $newUangmuka->save();

            return redirect('transport/umperjaka')->with('message-success','Data berhasil disimpan.');
      
    }

    public function edit($kd_uangmuka)
    {
        $karyawan = Karyawan::all();
        $rkapDetail = RkapDetail::all();
        $editum = Uangmuka::where('kd_uangmuka', $kd_uangmuka)->first();

        return view('transport/umperjaka-edit', compact('karyawan','rkapDetail','editum'));
    }

    public function update($kd_uangmuka, Request $request)
    {
        $no_uangmuka = $request->no_uangmuka;
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        $uraian = $request->uraian;
        $nilai_uangmuka = $request->nilai_uangmuka;
        $nik = $request->nik;
        $kd_aktifitas_rkap = $request->kd_aktifitas_rkap;

        $update = Uangmuka::where('kd_uangmuka', $kd_uangmuka)->first();
        $update->no_uangmuka = $no_uangmuka;
        $update->tgl_awal = $tgl_awal;
        $update->tgl_akhir = $tgl_akhir;
        $update->uraian = $uraian;
        $update->nilai_uangmuka = $nilai_uangmuka;
        $update->nik = $nik;
        $update->kd_aktifitas_rkap = $kd_aktifitas_rkap;
        $update->save();

        return redirect('transport/umperjaka');
    }

    // public function rubah($kd_uangmuka)
    // {
    //     $editUm = Uangmuka::where('kd_uangmuka', $kd_uangmuka)->first();
    //     return view('transport/umperjaka-rubah', ['editUm => $editUm']);
    // }

    public function sap($id)
    {
        $sap = Uangmuka::where('id', $id)->first();
        return view('transport/umperjaka-sap', ['sap' => $sap]);
    }

    public function simpan($id, Request $request)
    {
        $no_uangmuka = $request->input('no_uangmuka');
        $tgl = $request->input('tgl');

        $newRealisasi = Uangmuka::findOrFail($id);
        $newRealisasi->no_uangmuka = $no_uangmuka;
        $newRealisasi->tgl = $tgl;
        $newRealisasi->save();
                
        return redirect('transport/umperjaka');
    }

    public function detail($kd_uangmuka)
    {
        $rawDataUM = Uangmuka::where('kd_uangmuka', $kd_uangmuka)->first();
        return view('transport/uangmuka-detail', compact('rawDataUM'));
    }

    public function data()
    {
        if (Auth::user()->role == 'Admin') {
            $rawDataUM = Uangmuka::where('nik', Auth::user()->nik_bagian)->get();
        }
        elseif (Auth::user()->role == 'Worker' || Auth::user()->role == 'User') {
            $rawDataUM = uangmuka::where('nik', Auth::user()->nik)->get();
        }

        return view('transport/uangmuka-data', compact('rawDataUM'));
    }

    public function print($kd_uangmuka){
        $pdf = Uangmuka::where('kd_uangmuka', $kd_uangmuka)->first();
        // $tgl_awal = Carbon::createFromFormat('Y-m-d',$pdf->tgl_awal);
        // $tgl_akhir = Carbon::createFromFormat('Y-m-d',$pdf->tgl_akhir);
        // $waktu = $tgl_awal->diffInMonths($tgl_akhir) + 1;
        // $hari = $tgl_awal->diffInDays($tgl_akhir) + 1;
        $pdf = PDF::loadView('transport/umperjaka-print', [
            'pdf' => $pdf
            // 'waktu' => $waktu,
            // 'hari' => $hari
            ]);
        return $pdf->stream();
    }

}
