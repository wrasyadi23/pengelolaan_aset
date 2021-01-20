<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\Imports\UserImport;
use App\Karyawan;

class UsersController extends Controller
{
    public function index()
    {
        $user = User::all();

        return view('users', [
            'user' => $user,
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
        $user->remember_token = Str::random(60);

        $karyawan = new Karyawan;
        $karyawan->nama = $request->nama;
        $karyawan->nik = $request->nik;
        $karyawan->tempat_lahir = $request->tempat_lahir;
        $karyawan->tanggal_lahir = $request->tanggal_lahir;
        $karyawan->jenis_kelamin = $request->jenis_kelamin;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->golongan = $request->golongan;
        $karyawan->kd_direktorat = $request->kd_direktorat;
        $karyawan->kd_kompartemen = $request->kd_kompartemen;
        $karyawan->kd_departemen = $request->kd_departemen;
        $karyawan->kd_bagian = $request->kd_bagian;
        $karyawan->kd_seksi = $request->kd_seksi;
        $karyawan->kd_regu = $request->kd_regu;
        $karyawan->status = 'Aktif';
        
        return back()->with('success','Data berhasil disimpan.');
    }

    public function import(request $request)
    {
        // dd($request->file('user'));
        Excel::import(new UserImport, $request->file('user'));
        return back()->with('success', 'Data berhasil diupload.');
    }
}
