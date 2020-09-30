<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sr;
use App\Kontrak;
use App\TarifSewaEsd;
use App\Srfull;
use App\Kendaraan;
use App\KontrakBA;
use PDF;
use Carbon\Carbon;
class SrEsdController extends Controller
{
    public function baru(){
        $rawDataBA = KontrakBA::orderBy('id', 'desc')->get();
        return view('transport/sr-esd-create', [
            'rawDataBA' => $rawDataBA
            ]);
    }
    
}
