<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Fungsi untuk mengubah field login dari email menjadi NIK
     */
    public function username()
    {
        return 'nik';
    }

    public function validateLogin(Request $request)
    {
        $user = User::where('nik', $request->input('nik'))->first(); // Cari data user dengan NIK yang diinput
        if (!empty($user)) { // Jika ada data user dengan nik yang sama, cek status aktif
            if ($user->getKaryawan->status != 'Aktif') {
                throw ValidationException::withMessages(['nik' => 'Status karyawan tidak aktif']); // Munculkan error ketika karyawan tidak aktif
            }
        } else {
            throw ValidationException::withMessages(['nik' => 'Status karyawan tidak terdaftar']); // Jika tidak ada user terdaftar, tampilkan pesan user tidak terdaftar
        }
    }
}
