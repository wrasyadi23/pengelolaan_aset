<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Regu;
use App\Seksi;

class ReguController extends Controller
{
    public function index($kd_seksi)
    {
        $seksi = Seksi::where('kd_seksi', $kd_seksi)->firstOrFail();
        return view('organisasi-regu', ['seksi' => $seksi]);
    }

    public function store($kd_seksi,Request $request)
    {
        //get kode regu
        $data = Regu::select('id','kd_regu')
            ->orderBy('id', 'desc')->count();
        if ($data > 0) {
            $kd_regu = 'RU' . sprintf('%04s', $data + 1);
        } else {
            $kd_regu = 'RU' . sprintf('%04s', 1);
        }

        $regu = new Regu;
        $regu->kd_regu = $kd_regu;
        $regu->regu = $request->input('regu');
        $regu->kd_seksi = $kd_seksi;
        $regu->save();
        return redirect('organisasi-regu/'.$kd_seksi)->with('message', 'Data berhasil dimasukkan.');
    }

    public function edit($kd_regu)
    {
        $regu = Regu::where('kd_regu', $kd_regu)->first();
        return view('organisasi-regu-edit', ['regu' => $regu]);
    }

    public function update($kd_regu,Request $request)
    {
        $regu = Regu::where('kd_regu', $kd_regu)->first();
        $regu->regu = $request->input('regu');
        $regu->save();
        return redirect('organisasi-regu/'.$regu->kd_seksi)->with('message', 'Data berhasil diupdate.');
    }

    public function delete($id)
    {
        $regu = Regu::find($id);
        $regu->delete();
        return redirect()->back();
    }
}
