@extends('layouts.master')
@section('title','Klasifikasi Pekerjaan')
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
                            <h4 class="card-title">Input Klasifikasi Pekerjaan</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/pemeliharaan/klasifikasi-create'">+ Tambah Klasifikasi</button>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Regu</td>
                                        <td>Kode Klasifikasi</td>
                                        <td>Klasifikasi Pekerjaan</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $no = 1;    
                                @endphp
                                @foreach ($klasifikasi_pekerjaan as $item => $kp)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$kp->getRegu->regu}}</td>
                                        <td>{{$kp->kd_klasifikasi_pekerjaan}}</td>
                                        <td>{{$kp->klasifikasi_pekerjaan}}</td>
                                        <td>
                                            <a href="/pemeliharaan/klasifikasi-edit/{{$kp->id}}" class="badge badge-primary">Edit</a>
                                            <a href="/pemeliharaan/klasifikasi-delete/{{$kp->id}}" class="badge badge-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$klasifikasi_pekerjaan->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection