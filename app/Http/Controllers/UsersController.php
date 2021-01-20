<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UserImport;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Karyawan;
use App\Bagian;
use App\Seksi;
use App\Regu;

class UsersController extends Controller
{
    public function index()
    {
        $user = User::all();
        $bagian = Bagian::all();

        return view('users', [
            'user' => $user,
            'bagian' => $bagian,
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
            $karyawan->kd_departemen = '-';
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
}
