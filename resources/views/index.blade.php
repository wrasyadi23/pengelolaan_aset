@extends('layouts.master')
@section('title','Home')
@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Personil</h4>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>Nama/NIK</th>
                                        <td>{{Auth::user()->nama.' / '.Auth::user()->nik}}</td>
                                    </tr>
                                    <tr>
                                        <th>Tempat/Tanggal Lahir</th>
                                        <td>{{Auth::user()->getKaryawan->tempat_lahir.' / '.\Carbon\Carbon::parse(Auth::user()->getKaryawan->tanggal_lahir)->format('d M Y')}}</td>
                                    </tr>
                                    <tr>
                                        <th>Jabatan/Golongan</th>
                                        <td>{{Auth::user()->getKaryawan->jabatan.' / '.Auth::user()->getKaryawan->golongan}}</td>
                                    </tr>
                                    <tr>
                                        <th>Departemen</th>
                                        <td>{{Auth::user()->getKaryawan->getDepartemen->departemen}}</td>
                                    </tr>
                                    <tr>
                                        <th>Bagian</th>
                                        <td>{{Auth::user()->getKaryawan->getBagian->bagian}}</td>
                                    </tr>
                                    <tr>
                                        <th>Seksi</th>
                                        <td>{{Auth::user()->getKaryawan->getSeksi->seksi}}</td>
                                    </tr>
                                    <tr>
                                        <th>Regu</th>
                                        <td>{{Auth::user()->getKaryawan->getRegu->regu}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection