<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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

    public function update()
    {
        # code...
    }
}
