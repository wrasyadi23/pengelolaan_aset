@extends('layouts.master')
@section('title','Data Pekerjaan')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-6">
                            <h4 class="card-title">Input Pekerjaan</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" class="btn mb-1 btn-primary" onclick="window.location.href='/pemeliharaan/pekerjaan-create'">+ Tambah</button>
                        </div>
                    </div>
                    <div class="card-content">
                        @if (session('message'))
                            <div class="alert alert-success">{{session('message')}}</div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <td>No Booking</td>
                                        <td>Nama</td>
                                        <td>NIK</td>
                                        <td>Tanggal</td>
                                        <td>Jadwal Perbaikan</td>
                                        <td>Keterangan</td>
                                        <td>Status</td>
                                        <td>Detail</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($DataPekerjaan as $Pekerjaan => $item)    
                                    <tr>
                                        <td><a href="/pekerjaan/pekerjaan-info/{{$item->booknumber}}">{{$item->booknumber}}</a></td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->nik}}</td>
                                        <td>{{$item->tanggal_pekerjaan}}</td>
                                        <td>{{$item->tanggal_pelaksanaan}}</td>
                                        <td>{{$item->uraian}}</td>
                                        <td><span class="badge badge-primary">{{$item->status}}</span></td>
                                        <td><a href="/pemeliharaan/pekerjaan-detail/{{$item->booknumber}}" class="badge badge-success">Detail</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection