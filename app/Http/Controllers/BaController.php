<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rkap;
use App\RkapDetail;
use App\Kontrak;
use App\KontrakBA;
use App\KontrakFile;
use App\KontrakBAFile;
use App\HargaSewa;
use File;
use Auth;
use Carbon\Carbon;

class BaController extends Controller
{
    public function index()
    {
        $kontrakBA = KontrakBA::with(['getKontrak.getRkapDetail' => function ($query) {
            $query->where('tb_rkap_detail.kd_bagian', Auth::user()->kontrak_bagian)->select('*');
        }])->get();

        return view('ba', ['kontrakBA' => $kontrakBA]);
    }

    public function create()
    {
        $kontrak = Kontrak::with(['getRkapDetail' => function ($query) {
            $query->where('kd_bagian', Auth::user()->kontrak_bagian)->select('*');
        }])->get();

        return view('ba-create', ['kontrak' => $kontrak]);
    }

    public function store(Request $request)
    {
        $data = KontrakBA::select('id', 'kd_ba')
            ->orderBy('id', 'desc')->count();
        $tahun_sekarang = date('Ym');
        if ($data > 0) {
            $kd_ba = 'BA' . $tahun_sekarang . sprintf('%05s', $data + 1);
        } else {
            $kd_ba = 'BA' . $tahun_sekarang . sprintf('%05s', 1);
        }

        $no_ba = $request->no_ba;
        $uraian = $request->uraian;
        $tgl = $request->tgl;
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        $kd_sp = $request->kd_sp;

        $validation = KontrakBA::where('no_ba', $no_ba)->get();
        if ($validation->count() == 1) {
            return redirect('ba')->with('message-error', 'Data sudah ada.');
        } else {
            $newKontrakBA = new KontrakBA;
            $newKontrakBA->kd_ba = $kd_ba;
            $newKontrakBA->no_ba = $no_ba;
            $newKontrakBA->uraian = $uraian;
            $newKontrakBA->tgl = $tgl;
            $newKontrakBA->tgl_awal = $tgl_awal;
            $newKontrakBA->tgl_akhir = $tgl_akhir;
            $newKontrakBA->kd_sp = $kd_sp;
            $newKontrakBA->save();

            // update status sp
            $updateKontrak = Kontrak::where('kd_sp', $kd_sp)->first();
            $updateKontrak->status = 'Aktif';
            $updateKontrak->save();

            if ($request->hasFile('dokumen')) {
                foreach ($request->file('dokumen') as $key => $dokumen) {
                    $uid = uniqid(time(), false);
                    $filename = $uid . '_' . $dokumen->getClientOriginalName();
                    $dokumen->move(public_path('kontrakBA'), $filename);
                    $newKontrakFile = new KontrakBAFile;
                    $newKontrakFile->kd_ba = $kd_ba;
                    $newKontrakFile->file = $filename;
                    $newKontrakFile->save();
                }
            }

            return redirect('ba')->with('message-success', 'Data berhasil disimpan.');
        }
    }

    public function edit($kd_ba)
    {
        $kontrak = Kontrak::with(['getRkapDetail' => function ($query) {
            $query->where('kd_bagian', Auth::user()->kontrak_bagian)->select('*');
        }])->where('status','Aktif')->get();

        // ambil data eksisting
        $kontrakBA = KontrakBA::where('kd_ba', $kd_ba)->first();

        return view('ba-edit', [
            'kontrak' => $kontrak,
            'kontrakBA' => $kontrakBA,
        ]);
    }

    public function update($kd_ba, Request $request)
    {
        $no_ba = $request->no_ba;
        $uraian = $request->uraian;
        $tgl = $request->tgl;
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        $kd_sp = $request->kd_sp;

        $updateKontrakBa = KontrakBA::where('kd_ba', $kd_ba)->first();
        $updateKontrakBa->no_ba = $no_ba;
        $updateKontrakBa->uraian = $uraian;
        $updateKontrakBa->tgl = $tgl;
        $updateKontrakBa->tgl_awal = $tgl_awal;
        $updateKontrakBa->tgl_akhir = $tgl_akhir;
        $updateKontrakBa->kd_sp = $kd_sp;
        $updateKontrakBa->save();

        if ($request->hasFile('dokumen')) {
            foreach ($request->file('dokumen') as $key => $dokumen) {
                $uid = uniqid(time(), false);
                $filename = $uid . '_' . $dokumen->getClientOriginalName();
                $dokumen->move(public_path('kontrakBA'), $filename);
                $newKontrakFile = new KontrakBAFile;
                $newKontrakFile->kd_ba = $kd_ba;
                $newKontrakFile->file = $filename;
                $newKontrakFile->save();
            }
        }

        return redirect('ba-detail/' . $updateKontrakBa->kd_ba)->with('message-success-update', 'Data berhasil diupdate.');
    }

    public function detail($kd_ba)
    {
        $kontrakBA = KontrakBA::where('kd_ba', $kd_ba)->first();

        return view('ba-detail', compact('kontrakBA'));
    }
}
