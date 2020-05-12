<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departemen;
use App\Bagian;
use App\Seksi;
use App\Regu;

class OrganisasiController extends Controller
{
    public function index()
    {
        $departemen = Departemen::orderBy('id','asc')->paginate(10);
        return view('organisasi',['departemen'=>$departemen]);
    }
    
    public function create()
    {
        # code...
    }

    public function cariDepartemen(Request $request)
    {
        $key = $request->input('cari');
        $departemen = Departemen::where('departemen','like',$key)->orderBy('id','asc')->paginate(10);
        return view('organisasi',['departemen'=>$departemen]);
    }

    public function cariBagian($kd_departemen, Request $request)
    {
        $key = $request->input('cari');
        $bagian = Bagian::where([
            ['bagian','like',$key],
            ['kd_departemen',$kd_departemen],
            ])->orderBy('id','asc')->paginate(10);
        return view('view.name', $data);
    }
}
