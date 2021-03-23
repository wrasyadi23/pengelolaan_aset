@extends('layouts.master')
@section('title','Uangmuka Perjaka')
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
                            <h4 class="card-title">Uangmuka Perjaka</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/transport/umperjaka-create'">+ Tambah</button>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <td rowspan="2">No</td>
                                        <td rowspan="2">Kode Uangmuka</td>
                                        <td rowspan="2">Nomor Uangmuka</td>
                                        <td rowspan="2">Tanggal</td>
                                        <td align="center" colspan="2">Periode</td>
                                        <td rowspan="2">Uraian</td>
                                        <td rowspan="2">Uangmuka</td>
                                        <td rowspan="2">Status</td>
                                        <td rowspan="2">No.UM</td>
                                        {{-- <td rowspan="2">Detail</td> --}}
                                    </tr>
                                    <tr>
                                        <td>Awal</td>
                                        <td>Akhir</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                @foreach ($umperjaka as $uangmuka => $item)    
                                    <tr>
                                        <td align="center">{{ $no++ }}</td>
                                        <td align="center">{{$item->kd_uangmuka}}</td>
                                        <td align="center">{{$item->no_uangmuka}}</td>
                                        <td align="center">{{$item->tgl}}</td>
                                        <td align="center">{{$item->tgl_awal}}</td>
                                        <td align="center">{{$item->tgl_akhir}}</td>
                                        <td>{{$item->uraian}}</td>
                                        <td><div align="right"><span class="style1">{{ number_format($item->nilai_uangmuka,0) }}</span></div></td>
                                        <td><span class="badge badge-primary">{{$item->status}}</span></td>
                                        <td><a href="/transport/umperjaka-sap/{{$item->id}}" class="badge badge-success">Isi UmSap</a>
                                            <a href="/transport/umperjaka-edit/{{ $item->kd_uangmuka }}" class="badge badge-primary">Edit</a>
                                            <a href="/transport/umperjaka-print/{{ $item->kd_uangmuka }}" class="badge badge-success">Print</a>
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
