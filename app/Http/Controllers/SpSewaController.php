<?php

namespace App\Http\Controllers;
use App\AreaAlamat;
use App\Pekerjaan;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

class SpSewaController extends Controller
{
    public function spsewa(){
        return view('transport/spsewa');
    }
}
