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
}
