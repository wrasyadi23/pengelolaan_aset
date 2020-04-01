<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class input_pekerjaanController extends Controller
{
    public function index() {
        return view('pemeliharaan.pekerjaan');
    }

    public function create() {
        return view('pemeliharaan.pekerjaan-create');
    }
}
