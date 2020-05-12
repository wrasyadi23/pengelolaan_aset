<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departemen;
use App\Bagian;
use App\Seksi;
use App\Regu;

class OrganisasiController extends Controller
{
    public function index()
    {
        $departemen = Departemen::all();
        return view('organisasi',['departemen'=>$departemen]);
    }
}
