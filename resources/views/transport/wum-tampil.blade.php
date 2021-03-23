@extends('layouts.master')
@section('title','Wum Uangmuka Perjaka')
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
                            <h4 class="card-title">Wum Uangmuka Perjaka</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/transport/wum-create'">+ Tambah</button>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <td rowspan="2" align="center">No</td>
                                        <td rowspan="2" align="center">No.Wum</td>
                                        <td rowspan="2" align="center">Tanggal Wum</td>
                                        <td rowspan="2" align="center">Nomor Uangmuka</td>
                                        <td rowspan="2" align="center">Tanggal UM</td>
                                        <td rowspan="2" align="center">Uraian</td>
                                        <td rowspan="2" align="center">Uangmuka</td>
                                        <td rowspan="2" align="center">Status</td>
                                        <td rowspan="2" align="center">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                @foreach ($wum as $wum => $item)    
                                    <tr>
                                        <td align="center">{{ $no++ }}</td>
                                        <td align="center">{{$item->no_wum}}</td>
                                        <td align="center">{{$item->tgl}}</td>
                                        <td align="center">{{$item->getUangmuka->no_uangmuka}}</td>
                                        <td align="center">{{$item->getUangmuka->tgl}}</td>
                                        <td>{{$item->getUangmuka->uraian}}</td>
                                        <td><div align="right"><span class="style1">{{ number_format($item->getUangmuka->nilai_uangmuka,0) }}</span></div></td>
                                        <td align="center"><span class="badge badge-primary">{{$item->getUangmuka->status}}</span></td>
                                        <td align="center">
                                            <a href="/transport/wum-edit/{{$item->id}}" class="badge badge-success">Edit</a>
                                            <a href="/transport/wum-cetak/{{$item->kd_wum}}" class="badge badge-primary">Cetak</a>
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

