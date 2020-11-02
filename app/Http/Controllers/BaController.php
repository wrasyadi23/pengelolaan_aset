<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rkap;
use App\RkapDetail;
use App\Kontrak;
use App\KontrakBA;
use App\KontrakFile;
use App\KontrakBAFile;
use App\HargaSewa;
use File;
use Auth;
use Carbon\Carbon;

class BaController extends Controller
{
    public function index()
    {
        $kontrak = Kontrak::with(['getRkapDetail' => function ($query) {
            $query->where('kd_bagian', Auth::user()->kontrak_bagian)->select('*');
        }])->get();
        return view('ba', ['kontrak' => $kontrak]);
    }
}
