@extends('layouts.master')
@section('title','Uangmuka')
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
                            <h4 class="card-title">Uangmuka</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/transport/uangmuka-create'">+ Tambah</button>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <td rowspan="2">Kode Uangmuka</td>
                                        <td rowspan="2">Nomor Uangmuka</td>
                                        <td rowspan="2">Tanggal</td>
                                        <td colspan="2">Periode</td>
                                        <td rowspan="2">Uraian</td>
                                        <td rowspan="2">Uangmuka</td>
                                        <td rowspan="2">Status</td>
                                        <td rowspan="2">Detail</td>
                                    </tr>
                                    <tr>
                                        <td>Awal</td>
                                        <td>Akhir</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($rawDataUM as $uangmuka => $item)    
                                    <tr>
                                        <td>{{$item->kd_uangmuka}}</td>
                                        <td>{{$item->no_uangmuka}}</td>
                                        <td>{{$item->tgl}}</td>
                                        <td>{{$item->tgl_awal}}</td>
                                        <td>{{$item->tgl_akhir}}</td>
                                        <td>{{$item->uraian}}</td>
                                        <td>{{$item->nilai_uangmuka}}</td>
                                        <td><span class="badge badge-primary">{{$item->status}}</span></td>
                                        <td><a href="/transport/uangmuka-detail/{{$item->kd_uangmuka}}" class="badge badge-success">Detail</a></td>
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