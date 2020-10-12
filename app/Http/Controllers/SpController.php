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

class SpController extends Controller
{
    public function index()
    {
        $kontrak = Kontrak::where('kd_bagian', Auth::user()->kontrak_bagian)
            ->where('status','Aktif')->get();
        return view('sp', compact('kontrak'));
    }

    public function create()
    {
        return view('sp-create');
    }
    
    public function store(Request $request)
    {
        $data = Kontrak::select('id', 'kd_sp')
            ->orderBy('id', 'desc')->count();
        $tahun_sekarang = date('Ym');
        if ($data > 0) {
            $kd_sp = 'SP' . $tahun_sekarang . sprintf('%05s', $data + 1);
        } else {
            $kd_sp = 'SP' . $tahun_sekarang . sprintf('%05s', 1);
        }

        $no_sp = $request->no_sp;
        $cost_center = $request->cost_center;
        $gl_acc = $request->gl_acc;
        $deskripsi = $request->deskripsi;
        $uraian = $request->uraian;
        $keterangan = $request->keterangan;
        $tgl = $request->tgl;
        $harga = $request->harga;
        $jml = $request->jml;
        $satuan = $request->satuan;
        $rekanan = $request->rekanan;
        $status = $request->uraian;
        $kd_aktifitas_rkap = $request->kd_aktifitas_rkap;

        $validasi = Kontrak::where('no_sp', $no_sp)->get();
        if ($validasi->count() == 1) {
            return view('sp')->with('message-error', 'Data sudah ada.');
        } else {
            $newKontrak = new Kontrak;
            $newKontrak->kd_sp = $kd_sp;
            $newKontrak->no_sp = $no_sp;
            $newKontrak->cost_center = $cost_center;
            $newKontrak->gl_acc = $gl_acc;
            $newKontrak->deskripsi = $deskripsi;
            $newKontrak->uraian = $uraian;
            $newKontrak->keterangan = $keterangan;
            $newKontrak->tgl = $tgl;
            $newKontrak->harga = $harga;
            $newKontrak->jml = $jml;
            $newKontrak->satuan = $satuan;
            $newKontrak->rekanan = $rekanan;
            $newKontrak->status = 'Requested';
            $newKontrak->kd_aktifitas_rkap = $kd_aktifitas_rkap;
            $newKontrak->save();

            //bagaimana upload file extension hanya .jpg .jpeg dan .pdf?
            if ($request->hasFile('file')) {
                foreach ($request->hasFile('file') as $key => $file) {
                    $uid = uniqid(time(), false);
                    $filename = $uid . '_' . $file->getClientOriginalName();
                    $file->move(public_path('kontrak'), $filename);
                    $newKontrakFile = new KontrakFile;
                    $newKontrakFile->kd_sp = $kd_sp;
                    $newKontrakFile->file = $filename;
                    $newKontrakFile->save();
                }
            }

            return view('sp')->with('message-success', 'Data berhasil disimpan.');
        }
    }
}
