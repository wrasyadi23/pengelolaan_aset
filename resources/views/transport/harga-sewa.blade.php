@extends('layouts.master')
@section('title','Harga Sewa')
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
                    <h4 class="card-title">Data Harga Sewa Kendaraan</h4>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='/transport/harga-sewa-create'">+ Tambah Harga Sewa</button>
                    <div class="card-content">
                        <div class="form-group">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm table-bordered zero-configuration" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Klasifikasi Tarif</th>
                                            <th>Merk</th>
                                            <th>Type</th>
                                            <th>Jenis Kendaraan</th>
                                            <th>Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($hargasewa as $item)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->klasifikasi_tarif}}</td>
                                            <td>{{$item->merk}}</td>
                                            <td>{{$item->type}}</td>
                                            <td>{{$item->jenis_kend}}</td>
                                            <td>Rp. {{number_format($item->harga,2,',','.')}}</td>
                                            <td>
                                                <a href="/harga-sewa-delete/{{$item->kd_tarif}}" class="badge badge-danger">Hapus</a>
                                                <a href="/" class="badge badge-primary"></a>
                                            </td>
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