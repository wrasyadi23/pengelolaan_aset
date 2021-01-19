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
        return back()->with('success','Data berhasil disimpan.');
    }

    public function import(request $request)
    {
        // dd($request->file('user'));
        Excel::import(new UserImport, $request->file('user'));
        return back()->with('success', 'Data berhasil diupload.')
    }
}
