<?php

namespace App\Http\Controllers;

use App\Parkirtol;
use App\ParkirtolDetail;
use Carbon\Carbon;
use File;
use Auth;
use Illuminate\Http\Request;

class parkirtolController extends Controller
{
    public function index()
    {
        return view('transport/parkirtol');
    }

    
}
