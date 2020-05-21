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
            $kd_bagian = 'BAG' . sprintf('%04s', $data + 1);
        } else {
            $kd_bagian = 'BAG' . sprintf('%04s', 1);
        }

        $bagian = new Bagian;
        $bagian->kd_bagian = $kd_bagian;
        $bagian->bagian = $request->input('bagian');
        $bagian->kd_departemen = $kd_departemen;
        $bagian->save();

        return redirect('organisasi-bagian/'.$kd_departemen)->with('message','Data berhasil dimasukkan.');
    }

    public function edit($kd_bagian)
    {
        $bagian = Bagian::where('kd_bagian',$kd_bagian)->first();
        return view('organisasi-bagian-edit', ['bagian' => $bagian]);
    }
}
