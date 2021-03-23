@extends('layouts.master')
@section('title','P T K Perjaka')
@section('content')    
<div class="container-fluid mt-3">
    @if (session('message-success'))
        <div class="alert alert-success">{{session('message-success')}}</div>
    @elseif (session('message-error'))
        <div class="alert alert-danger">{{session('message-error')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-6">
                            <h4 class="card-title">P T K Perjaka</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/transport/umperjaka-ptk-create'">+ Tambah</button>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <td rowspan="2" align="center">No</td>
                                        <td rowspan="2" align="center">Kode Ptk</td>
                                        <td rowspan="2" align="center">Nomor Ptk</td>
                                        <td rowspan="2" align="center">Tanggal</td>
                                        <td rowspan="2" align="center">Uraian</td>
                                        <td rowspan="2" align="center">Nilai Ptk</td>
                                        <td rowspan="2" align="center">Pemohon</td>
                                        <td rowspan="2" align="center">Status</td>
                                        <td rowspan="2">Detail</td>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                @foreach ($ptk as $result => $item)
                                    <tr>
                                        <td align="center">{{ $no++ }}</td>
                                        <td align="center">{{$item->kd_ptk}}</td>
                                        <td align="center">{{$item->no_ptk}}</td>
                                        <td align="center">{{$item->tgl}}</td>
                                        <td>{{$item->uraian}}</td>
                                        <td align="right">{{ number_format($item->nilai_ptk,0) }}</td>
                                        <td>{{$item->getKaryawan->nama}}</td>
                                        <td><span class="badge badge-primary">{{$item->status}}</span></td>
                                        <td>
                                            <a href="/transport/umperjaka-ptk-edit/{{$item->kd_ptk}}" class="badge badge-success">Edit</a>
                                            <a href="/transport/umperjaka-ptk-print/{{$item->kd_ptk}}" class="badge badge-primary">Print</a>
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
@endsection
@section('script')

@endsection