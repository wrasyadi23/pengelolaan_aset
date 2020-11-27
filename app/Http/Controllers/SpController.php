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
        $kontrak = Kontrak::with(['getRkapDetail' => function ($query) {
            $query->where('kd_bagian', Auth::user()->kontrak_bagian)->select('*');
        }])->get();
        return view('sp', ['kontrak' => $kontrak]);
    }

    public function create()
    {
        $rkap = Rkap::where('kd_departemen', Auth::user()->getKaryawan->kd_departemen)
            ->where('status', 'Aktif')
            ->groupBy('cost_center')
            ->get();
        return view('sp-create', ['rkap' => $rkap]);
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
        $deskripsi = $request->deskripsi;
        $uraian = $request->uraian;
        $keterangan = $request->keterangan;
        $tgl = $request->tgl;
        $harga = $request->harga;
        $jml = $request->jml;
        $satuan = $request->satuan;
        $rekanan = $request->rekanan;
        $jenis_sp = $request->jenis_sp;
        $kd_aktifitas_rkap = $request->kd_aktifitas_rkap;

        $newKontrak = new Kontrak;
        $newKontrak->kd_sp = $kd_sp;
        $newKontrak->no_sp = $no_sp;
        $newKontrak->deskripsi = $deskripsi;
        $newKontrak->uraian = $uraian;
        $newKontrak->keterangan = $keterangan;
        $newKontrak->tgl = $tgl;
        $newKontrak->harga = $harga;
        $newKontrak->jml = $jml;
        $newKontrak->satuan = $satuan;
        $newKontrak->rekanan = $rekanan;
        $newKontrak->jenis_sp = $jenis_sp;
        $newKontrak->status = 'Requested';
        $newKontrak->kd_aktifitas_rkap = $kd_aktifitas_rkap;
        $newKontrak->save();

        //bagaimana upload file extension hanya .jpg .jpeg dan .pdf?
        if ($request->hasFile('dokumen')) {
            foreach ($request->file('dokumen') as $key => $dokumen) {
                $uid = uniqid(time(), false);
                $filename = $uid . '_' . $dokumen->getClientOriginalName();
                $dokumen->move(public_path('kontrak'), $filename);
                $newKontrakFile = new KontrakFile;
                $newKontrakFile->kd_sp = $kd_sp;
                $newKontrakFile->file = $filename;
                $newKontrakFile->save();
            }
        }

        return redirect('sp')->with('message-success', 'Data berhasil disimpan.');
        
    }

    public function edit($kd_sp)
    {
        $rkap = Rkap::where('kd_departemen', Auth::user()->getKaryawan->kd_departemen)
            ->where('status', 'Aktif')
            ->groupBy('cost_center')
            ->get();

        // ambil data kontrak eksisting
        $kontrak = Kontrak::where('kd_sp', $kd_sp)->first();
        $gl_acc = Rkap::where('kd_departemen', $kontrak->getRkapDetail->getRkap->kd_departemen)->get();
        $kd_aktifitas_rkap = RkapDetail::where('kd_rkap', $kontrak->getRkapDetail->kd_rkap)->get();

        return view('sp-edit', [
            'kontrak' => $kontrak,
            'rkap' => $rkap,
            'gl_acc' => $gl_acc,
            'kd_aktifitas_rkap' => $kd_aktifitas_rkap
        ]);
    }

    public function update($kd_sp, Request $request)
    {
        $no_sp = $request->no_sp;
        $deskripsi = $request->deskripsi;
        $uraian = $request->uraian;
        $keterangan = $request->keterangan;
        $tgl = $request->tgl;
        $harga = $request->harga;
        $jml = $request->jml;
        $satuan = $request->satuan;
        $rekanan = $request->rekanan;
        $jenis_sp = $request->jenis_sp;
        $kd_aktifitas_rkap = $request->kd_aktifitas_rkap;

        $updateKontrak = Kontrak::where('kd_sp', $kd_sp)->first();
        $updateKontrak->no_sp = $no_sp;
        $updateKontrak->deskripsi = $deskripsi;
        $updateKontrak->uraian = $uraian;
        $updateKontrak->keterangan = $keterangan;
        $updateKontrak->tgl = $tgl;
        $updateKontrak->harga = $harga;
        $updateKontrak->jml = $jml;
        $updateKontrak->satuan = $satuan;
        $updateKontrak->rekanan = $rekanan;
        $updateKontrak->jenis_sp = $jenis_sp;
        $updateKontrak->kd_aktifitas_rkap = $kd_aktifitas_rkap;
        $updateKontrak->save();

        if ($request->hasFile('dokumen')) {
            foreach ($request->file('dokumen') as $key => $dokumen) {
                $uid = uniqid(time(), false);
                $filename = $uid . '_' . $dokumen->getClientOriginalName();
                $dokumen->move(public_path('kontrak'), $filename);
                $newKontrakFile = new KontrakFile;
                $newKontrakFile->kd_sp = $kd_sp;
                $newKontrakFile->file = $filename;
                $newKontrakFile->save();
            }
        }

        return redirect('sp-detail/' . $updateKontrak->kd_sp)->with('message-success-update', 'Data berhasil diupdate.');
    }

    public function delete($kd_sp)
    {
        $deleteKontrak = Kontrak::where('kd_sp', $kd_sp)->first();
        if ($deleteKontrak->status == 'Requested') {
            $deleteKontrakFile = KontrakFile::where('kd_sp', $kd_sp)->get();
            foreach ($deleteKontrakFile as $key => $item) {
                unlink(public_path('kontrak/' . $item->file));
                $item->delete();
            }
            $deleteKontrak->delete();

            return redirect('sp')->with('message-success-delete', 'Data berhasil dihapus.');
        } else {
            return redirect('sp-detail/' . $kd_sp)->with('message-error-delete', 'Tidak dapat menghapus data. Silahkan hapus Berita Acara terkait dengan Kontrak ini.');
        }
    }

    public function deleteFile($id)
    {
        $kontrakFile = KontrakFile::where('id', $id)->first();
        $kontrakFile->delete();
        unlink(public_path('kontrak/') . $kontrakFile->file);

        return redirect()->back();
    }

    public function detail($kd_sp)
    {
        $kontrak = Kontrak::where('kd_sp', $kd_sp)->first();

        return view('sp-detail', compact('kontrak'));
    }
}
