@extends('layouts.master')
@section('title','Data Pekerjaan')
@section('content')
<div class="container-fluid mt-3">
    @if (session('message-success'))
        <div class="alert alert-success">{{session('message-success')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Pekerjaan</h4>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='/pemeliharaan/pekerjaan-create'">+ Tambah Pekerjaan</button>
                    <div class="card-content">
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
                                @foreach ($pekerjaan as $result => $item)    
                                    <tr>
                                        <td>{{$item->booknumber}}</td>
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