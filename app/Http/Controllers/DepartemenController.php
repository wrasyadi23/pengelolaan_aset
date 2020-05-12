<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departemen;

class DepartemenController extends Controller
{
    public function index()
    {
        $departemen = Departemen::all();
        return view('organisasi-departemen',['departemen'=>$departemen]);
    }

    public function create()
    {
        return view('organisasi-departemen-create');
    }

    public function store(Request $request)
    {
        //get kode departemen
        $data = Departemen::select('id','kd_departemen')
            ->orderBy('id', 'desc')->count();
        if ($data > 0) {
            $kd_departemen = 'DEP' . sprintf('%04s', $data + 1);
        } else {
            $kd_departemen = 'DEP' . sprintf('%04s', 1);
        }

        $departemen = new Departemen;
        $departemen->kd_departemen = $kd_departemen;
        $departemen->departemen = $departemen;

        return redirect('organisasi-departemen')->with('message', 'Departemen baru berhasil dimasukkan.');
    }

    public function edit($kd_departemen)
    {
        $departemen = Departemen::where('kd_departemen',$kd_departemen)->first();
        return view('organisasi-departemen-edit', ['departemen' => $departemen]);   
    }

    public function update($kd_departemen, Request $request)
    {
        $departemen = Departemen::where('kd_departemen',$kd_departemen)->first();
        $departemen->departemen = $request->input('departemen');
        $departemen->save();
        return redirect('organisasi-departemen')->with('message', 'Data berhasil diupdate.');
    }

    public function delete($id)
    {
        $departemen = Departemen::find($id);
        $departemen->delete();
        return redirect()->back();
    }
}
