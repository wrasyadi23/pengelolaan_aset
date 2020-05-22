<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bagian;
use App\Departemen;

class BagianController extends Controller
{
    public function index($kd_departemen)
    {
        $bagian = Bagian::where('kd_departemen',$kd_departemen)->orderBy('id','asc')->get();

        // Query start dari departemen, karena jika start dari bagian, data bagiannya masih kosong (tidak ada kd_departemen)
        $departemen = Departemen::where('kd_departemen', $kd_departemen)->firstOrFail(); 
        return view('organisasi-bagian', [
            'departemen' => $departemen,
            'bagian' => $bagian //Variabel dibawa hanya untuk contoh
        ]);
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

    public function update($kd_bagian, Request $request)
    {
        $bagian = Bagian::where('kd_bagian',$kd_bagian)->first();
        $bagian->bagian = $request->input('bagian');
        $bagian->save();
        return redirect('organisasi-bagian/'.$bagian->kd_departemen)->with('message', 'Data berhasil diupdate.');
    }

    public function delete($id)
    {
        $bagian = Bagian::find($id);
        $bagian->delete();
        return redirect()->back();
    }
}
