<?php

namespace App\Http\Controllers;
use App\Kontrak;
use App\KontrakBA;
use Auth;
use File;
use Illuminate\Http\Request;

class BAController extends Controller
{
    public function index()
    {
        $rawDataSP = Kontrak::where('status','Requested')->get();
        return view('transport/sewa-ba-create',[
            'rawDataSP' => $rawDataSP
        ]);
    }

    public function store(Request $request)
    {
        # code...
    }
}
