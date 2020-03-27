<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pemeliharaanController extends Controller
{
    public function index(){
        return view('pemeliharaan.index');
    }
}
