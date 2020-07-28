@extends('layouts.master')
@section('title','Parkir & Tol')
@section('content')
<div class="container-fluid mt-3">
    @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-6">
                            <h4 class="card-title">Parkir & Tol</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/transport/parkirtol'">+ Tambah</button>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <td>Kode Parkirtol</td>
                                        <td>Nama</td>
                                        <td>NIK</td>
                                        <td>Tanggal</td>
                                        <td>Melayani</td>
                                        <td>Uraian</td>
                                        <td>Status</td>
                                        <td>Detail</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($parkirtol as $data => $item)    
                                    <tr>
                                        <td>{{$item->kd_parkirtol}}</td>
                                        <td>{{$item->getPengemudi->nama}}</td>
                                        <td>{{$item->getPengemudi->nik}}</td>
                                        <td>{{$item->tgl}}</td>
                                        <td>{{$item->melayani}}</td>
                                        <td>{{$item->uraian}}</td>
                                        <td><span class="badge badge-primary">{{$item->status}}</span></td>
                                        <td><a href="/transport/parkirtol-detail/{{$item->kd_parkirtol}}" class="badge badge-success">Detail</a></td>
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