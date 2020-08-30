<?php

namespace App\Http\Controllers;

use App\Parkirtol;
use App\ParkirtolDetail;
use App\Uangmuka;
use App\Pengemudi;
use Validator;
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
        $data = Parkirtol::select('id', 'kd_parkirtol', 'tgl')
            ->whereYear('tgl', date('Y'))
            ->orderBy('id', 'desc')->count();
        $tahun_sekarang = date('Ym');
        if ($data > 0) {
            $kd_parkirtol = 'PT' . $tahun_sekarang . sprintf('%05s', $data + 1);
        } else {
            $kd_parkirtol = 'PT' . $tahun_sekarang . sprintf('%05s', 1);
        }

        if($request->ajax())
        {
            $rules = array(
                'nilai_karcis.*'  => 'required',
                'jml_karcis.*'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }
            
            $kd_pengemudi = $request->kd_pengemudi;
            $kd_uangmuka = $request->kd_uangmuka;
            $nilai_karcis = $request->nilai_karcis;
            $jml_karcis = $request->jml_karcis;
            $tgl = $request->tgl;
            $trip_start = $request->trip_start;
            $trip_end = $request->trip_end;
            $melayani = $request->melayani;
            $uraian = $request->uraian;

            $getNIK = Pengemudi::where('kd_pengemudi', $kd_pengemudi)->first();

            $newParkirtol = new Parkirtol();
            $newParkirtol->kd_parkirtol = $kd_parkirtol;
            $newParkirtol->nik = $getNIK->nik;
            $newParkirtol->tgl = $tgl;
            $newParkirtol->trip_start = $trip_start;
            $newParkirtol->trip_end = $trip_end;
            $newParkirtol->melayani = $melayani;
            $newParkirtol->uraian = $uraian;
            $newParkirtol->status ='Requested';
            $newParkirtol->creator = Auth::user()->nik;
            // $newParkirtol->tgl_bayar = $request->tgl;
            $newParkirtol->kd_uangmuka = $kd_uangmuka;
            $newParkirtol->kd_pengemudi = $kd_pengemudi;
            $newParkirtol->save();

            for($count = 0; $count < count($nilai_karcis); $count++)
            {
            $data = array(
                'kd_parkirtol' => $kd_parkirtol,
                'nilai_karcis' => $nilai_karcis[$count],
                'jml_karcis'  => $jml_karcis[$count]
            );
            $insert_data[] = $data;
            }
            ParkirtolDetail::insert($insert_data);

            return response()->json([
            'success'  => 'Data Berhasil Disimpan.'
            ]);
        }


    }
}
