<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kontrak;
use App\KontrakBA;
use App\HargaSewa;
use Auth;
use Carbon\Carbon;

class HargaSewaController extends Controller
{
    public function index()
    {
        $hargasewa = HargaSewa::all();
        return view('transport/harga-sewa', [
            'hargasewa' => $hargasewa,
        ]);
    }
}
