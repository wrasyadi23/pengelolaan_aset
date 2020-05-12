<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bagian;

class BagianController extends Controller
{
    public function index($kd_departemen)
    {
        $bagian = Bagian::where('kd_departemen',$kd_departemen)->orderBy('id','asc');
        return view('organisasi-bagian', ['bagian' => $bagian]);
    }

    
}
