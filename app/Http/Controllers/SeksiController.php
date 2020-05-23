<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seksi;
use App\Bagian;

class SeksiController extends Controller
{
    public function index($kd_bagian)
    {
        $bagian = Bagian::where('kd_bagian',$kd_bagian)->firstOrFail();
        return view('organisasi-seksi', ['bagian' => $bagian]);
    }

    public function store($kd_bagian,Request $request)
    {
        //get kode seksi
        $data = Seksi::select('id','kd_seksi')
            ->orderBy('id', 'desc')->count();
        if ($data > 0) {
            $kd_seksi = 'SIE' . sprintf('%04s', $data + 1);
        } else {
            $kd_seksi = 'SIE' . sprintf('%04s', 1);
        }

        $seksi = new Seksi;
        $seksi->kd_seksi = $kd_seksi;
        $seksi->seksi = $request->input('seksi');
        $seksi->kd_bagian = $kd_bagian;
        $seksi->save();
        return redirect('organisasi-seksi/'.$kd_bagian)->with('message', 'Data berhasil dimasukkan.');
    }

    public function edit($kd_seksi)
    {
        $seksi = Seksi::where('kd_seksi',$kd_seksi)->first();
        return view('organisasi-seksi-edit', ['seksi' => $seksi]);
    }

    public function update($kd_seksi,Request $request)
    {
        $seksi = Seksi::where('kd_seksi',$kd_seksi)->first();
        $seksi->seksi = $request->input('seksi');
        $seksi->save();
        return redirect('organisasi-seksi/'.$seksi->kd_bagian)->with('message', 'Data berhasil diupdate.');
    }

    public function delete($id)
    {
        $seksi = Seksi::find($id);
        $seksi->delete();
        return redirect()->back();
    }
}
