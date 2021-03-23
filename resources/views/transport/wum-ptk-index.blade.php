<style type="text/css">
.style1 {color: #FF00FF}
.style2 {color: #000000}
</style>
@extends('layouts.master')
@section('title','Wum Ptk Perjaka')
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
                            <h4 class="card-title">Wum Ptk Perjaka</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/transport/wum-ptk-create'">+ Tambah</button>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <td rowspan="2" align="center"><span class="style1">No</span></td>
                                        <td rowspan="2" align="center"><span class="style1">No.Wum</span></td>
                                        <td rowspan="2" align="center"><span class="style1">Tanggal Wum</span></td>
                                        <td rowspan="2" align="center"><span class="style1">Nomor Ptk</span></td>
                                        <td rowspan="2" align="center"><span class="style1">Tanggal UM</span></td>
                                        <td rowspan="2" align="center"><span class="style1">Uraian</span></td>
                                        <td rowspan="2" align="center"><span class="style1">Uangmuka</span></td>
                                        <td rowspan="2" align="center"><span class="style1">Status</span></td>
                                        <td rowspan="2" align="center"><span class="style1">Aksi</span></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                @foreach ($wumptk as $wum => $item)    
                                    <tr>
                                        <td align="center">{{ $no++ }}</td>
                                        <td align="center">{{$item->no_wum}}</td>
                                        <td align="center">{{$item->tgl}}</td>
                                        <td align="center">{{$item->getPtk->no_ptk}}</td>
                                        <td align="center">{{$item->getPtk->tgl}}</td>
                                        <td>{{$item->getPtk->uraian}}</td>
                                        <td><div align="right"><span class="style2">{{ number_format($item->getPtk->nilai_ptk,0) }}</span></div></td>
                                        <td align="center"><span class="badge badge-primary">{{$item->getPtk->status}}</span></td>
                                        <td align="center"><a href="/transport/wum-edit/{{$item->id}}" class="badge badge-success">Edit</a></td>
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

