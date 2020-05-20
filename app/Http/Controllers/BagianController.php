<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bagian;

class BagianController extends Controller
{
    public function index($kd_departemen)
    {
        $bagian = Bagian::where('kd_departemen',$kd_departemen)->orderBy('id','asc')->get();
        return view('organisasi-bagian', ['bagian' => $bagian]);
    }

    public function store($kd_departemen,Request $request)
    {
        //get kode bagian
        $data = Bagian::select('id','kd_bagian')
            ->orderBy('id', 'desc')->count();
        if ($data > 0) {
            $kd_bagian = 'DEP' . sprintf('%04s', $data + 1);
        } else {
            $kd_bagian = 'DEP' . sprintf('%04s', 1);
        }
    }
}
