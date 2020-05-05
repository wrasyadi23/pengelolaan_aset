@extends('layouts.master')
@section('title','Data Pekerjaan')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Pekerjan</h4>
                    <!-- Nav tabs -->
                    <div class="default-tab">
                        <ul class="nav nav-tabs mb-3" role="tablist">
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#requested">Requested</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#approved">Approved</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#canceled">Canceled</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#closed">Closed</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="requested" role="tabpanel">
                                <div class="p-t-15">
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
                                                @foreach ($pekerjaan->where('status','Requested') as $requested => $req)
                                                    <tr>
                                                        <td>{{$req->booknumber}}</td>
                                                        <td>{{$req->nama}}</td>
                                                        <td>{{$req->nik}}</td>
                                                        <td>{{$req->tanggal_pekerjaan}}</td>
                                                        <td>{{$req->tanggal_pelaksanaan}}</td>
                                                        <td>{{$req->uraian}}</td>
                                                        <td><span class="badge badge-primary">{{$req->status}}</span></td>
                                                        <td><a href="/pemeliharaan/pekerjaan-detail/{{$req->booknumber}}" class="badge badge-success">Detail</a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="approved">
                                <div class="p-t-15">
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
                                                @foreach ($pekerjaan->where('status','Approved') as $approved => $approve)
                                                    <tr>
                                                        <td>{{$approve->booknumber}}</td>
                                                        <td>{{$approve->nama}}</td>
                                                        <td>{{$approve->nik}}</td>
                                                        <td>{{$approve->tanggal_pekerjaan}}</td>
                                                        <td>{{$approve->tanggal_pelaksanaan}}</td>
                                                        <td>{{$approve->uraian}}</td>
                                                        <td><span class="badge badge-primary">{{$approve->status}}</span></td>
                                                        <td><a href="/pemeliharaan/pekerjaan-detail/{{$approve->booknumber}}" class="badge badge-success">Detail</a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="canceled">
                                <div class="p-t-15">
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
                                                @foreach ($pekerjaan->where('status','Canceled') as $canceled => $cancel)
                                                    <tr>
                                                        <td>{{$cancel->booknumber}}</td>
                                                        <td>{{$cancel->nama}}</td>
                                                        <td>{{$cancel->nik}}</td>
                                                        <td>{{$cancel->tanggal_pekerjaan}}</td>
                                                        <td>{{$cancel->tanggal_pelaksanaan}}</td>
                                                        <td>{{$cancel->uraian}}</td>
                                                        <td><span class="badge badge-primary">{{$cancel->status}}</span></td>
                                                        <td><a href="/pemeliharaan/pekerjaan-detail/{{$cancel->booknumber}}" class="badge badge-success">Detail</a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Closed">
                                <div class="p-t-15">
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
                                                @foreach ($pekerjaan->where('status','Closed') as $closed => $close)
                                                    <tr>
                                                        <td>{{$close->booknumber}}</td>
                                                        <td>{{$close->nama}}</td>
                                                        <td>{{$close->nik}}</td>
                                                        <td>{{$close->tanggal_pekerjaan}}</td>
                                                        <td>{{$close->tanggal_pelaksanaan}}</td>
                                                        <td>{{$close->uraian}}</td>
                                                        <td><span class="badge badge-primary">{{$close->status}}</span></td>
                                                        <td><a href="/pemeliharaan/pekerjaan-detail/{{$close->booknumber}}" class="badge badge-success">Detail</a></td>
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
    </div>
</div>
@endsection