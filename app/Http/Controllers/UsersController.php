<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UserImport;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Karyawan;
use App\Departemen;
use App\Bagian;
use App\Seksi;
use App\Regu;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    public function index()
    {
        $user = Karyawan::orderBy('id', 'asc')->get();
        $departemen = Departemen::all();
        return view('users', [
            'user' => $user,
            'departemen' => $departemen,
        ]);
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->nama = $request->nama;
        $user->nik = $request->nik;
        $user->email = $request->email;
        $user->password = Hash::make($request->nik);
        $user->role = $request->role;
        $user->level = $request->level;
        $user->remember_token = Str::random(60);
        $user->save();

        if ($request->role == 'Worker') {
            $karyawan = new Karyawan;
            $karyawan->nama = $request->nama;
            $karyawan->nik = $request->nik;
            $karyawan->tempat_lahir = '-';
            $karyawan->tanggal_lahir ='-';
            $karyawan->jenis_kelamin = '-';
            $karyawan->jabatan = '-';
            $karyawan->golongan = '-';
            $karyawan->kd_direktorat = '-';
            $karyawan->kd_kompartemen = '-';
            $karyawan->kd_departemen = $request->kd_departemen;
            $karyawan->kd_bagian = $request->kd_bagian;
            $karyawan->kd_seksi = $request->kd_seksi;
            $karyawan->kd_regu = $request->kd_regu;
            $karyawan->status = 'Aktif';
            $karyawan->save();
        }
        
        return back()->with('success','Data berhasil disimpan.');
    }

    public function import(request $request)
    {
        // dd($request->file('user'));
        Excel::import(new UserImport, $request->file('user'));
        return back()->with('success', 'Data berhasil diupload.');
    }

    public function changestatus($nik)
    {
        $karyawan = Karyawan::where('nik', $nik)->first();
        if ($karyawan->status == 'Aktif') {
            $karyawan->status = 'Non Aktif';
        } else {
            $karyawan->status = 'Aktif';
        }
        $karyawan->save();
        return back()->with('status', 'Status berhasil dirubah.');
    }

    public function delete($nik)
    {
        Karyawan::where('nik', $nik)->delete();
        User::where('nik', $nik)->delete();
        return back()->with('delete', 'User berhasil dihapus.');
    }
}
