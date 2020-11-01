@extends('layouts.master')
@section('title','Kontrak/SP')
@section('content')
<div class="container-fluid mt-3">
    @if (session('message-success'))
        <div class="alert alert-success">{{session('message-success')}}</div>
    @elseif (session('message-error'))
        <div class="alert alert-danger">{{session('message-error')}}</div>
    @elseif (session('message-success-delete'))
        <div class="alert alert-success">{{session('message-success-delete')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-6">
                            <h4 class="card-title">Data Kontrak/SP - Bagian {{Auth::user()->getKaryawan->getBagian->bagian}}</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/sp-create'">+ Kontrak/SP Baru</button>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="form-group">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm table-bordered zero-configuration" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>No. Kontrak</th>
                                            <th>Tanggal</th>
                                            <th>Deskripsi</th>
                                            <th>Vendor</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($kontrak as $item => $sp)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$sp->kd_sp}}</td>
                                            <td>{{$sp->no_sp}}</td>
                                            <td>{{$sp->tgl}}</td>
                                            <td>{{$sp->deskripsi}}</td>
                                            <td>{{$sp->rekanan}}</td>
                                            <td>
                                                @if ($sp->status == "Requested")
                                                    <a href="" class="badge badge-warning">{{$sp->status}}</a>
                                                @elseif ($sp->status == "Aktif")
                                                    <a href="" class="badge badge-success">{{$sp->status}}</a>
                                                @else
                                                    <a href="" class="badge badge-danger">{{$sp->status}}</a>
                                                @endif
                                            </td>
                                            <td><a href="/sp-detail/{{$sp->kd_sp}}" class="badge badge-success">Detail</a></td>
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
</div>
@endsection
@section('script')
    
@endsection