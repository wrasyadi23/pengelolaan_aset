@extends('layouts.master')
@section('title','Data Pekerjaan')
@section('content')
<div class="container-fluid mt-3">
    @if (session('message-success'))
        <div class="alert alert-success">{{session('message-success')}}</div>
    @elseif (session('approve'))
        <div class="alert alert-success">{{session('approve')}}</div>
    @elseif (session('done'))
        <div class="alert alert-success">{{session('done')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Pekerjaan</h4>
                    <button type="button" class="btn btn-primary mb-3" onclick="window.location.href='/pemeliharaan/pekerjaan-create'">+ Tambah Pekerjaan</button>
                    <div class="card-content">
                        <div class="default-tab">
                            <ul class="nav nav-tabs mb-3" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#requested">Requested ({{$pekerjaan->where('status', 'Requested')->count()}})</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#approved">Approved ({{$pekerjaan->where('status', 'Approved')->count()}})</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#inprogress">In Progress ({{$pekerjaan->where('status', 'In Progress')->count()}})</a>
                                </li> 
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#done">Done ({{$pekerjaan->where('status', 'Done')->count()}})</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#closed">Closed</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                {{-- tab requested  --}}
                                <div class="tab-pane fade show active" id="requested" role="tabpanel">
                                    <div class="p-t-15">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered zero-configuration" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <td>No Booking</td>
                                                        <td>Nama</td>
                                                        <td>NIK</td>
                                                        <td>Tanggal</td>
                                                        <td>Klasifikasi</td>
                                                        <td>Status</td>
                                                        <td>Detail</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($pekerjaan->where('status','Requested') as $result => $item)    
                                                    <tr>
                                                        <td>{{$item->booknumber}}</td>
                                                        <td>{{$item->nama}}</td>
                                                        <td>{{$item->nik}}</td>
                                                        <td>{{$item->tanggal_pekerjaan}}</td>
                                                        <td>{{$item->getKlasifikasi->klasifikasi_pekerjaan}}</td>
                                                        <td><span class="badge badge-primary">{{$item->status}}</span></td>
                                                        <td><a href="/pemeliharaan/pekerjaan-detail/{{$item->booknumber}}" class="badge badge-success">Detail</a></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {{-- tab approved  --}}
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
                                                        <td>Klasifikasi</td>
                                                        <td>Status</td>
                                                        <td>Detail</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($pekerjaan->where('status','Approved') as $result => $approved)    
                                                    <tr>
                                                        <td>{{$approved->booknumber}}</td>
                                                        <td>{{$approved->nama}}</td>
                                                        <td>{{$approved->nik}}</td>
                                                        <td>{{$approved->tanggal_pekerjaan}}</td>
                                                        <td>{{$approved->tanggal_pelaksanaan}}</td>
                                                        <td>{{$approved->getKlasifikasi->klasifikasi_pekerjaan}}</td>
                                                        <td><span class="badge badge-primary">{{$approved->status}}</span></td>
                                                        <td><a href="/pemeliharaan/pekerjaan-detail/{{$approved->booknumber}}" class="badge badge-success">Detail</a></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {{-- tab inprogress  --}}
                                <div class="tab-pane fade" id="inprogress">
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
                                                        <td>Klasifikasi</td>
                                                        <td>Status</td>
                                                        <td>Detail</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($pekerjaan->where('status','In Progress') as $result => $inprogress)    
                                                    <tr>
                                                        <td>{{$inprogress->booknumber}}</td>
                                                        <td>{{$inprogress->nama}}</td>
                                                        <td>{{$inprogress->nik}}</td>
                                                        <td>{{$inprogress->tanggal_pekerjaan}}</td>
                                                        <td>{{$inprogress->tanggal_pelaksanaan}}</td>
                                                        <td>{{$inprogress->getKlasifikasi->klasifikasi_pekerjaan}}</td>
                                                        <td><span class="badge badge-primary">{{$inprogress->status}}</span></td>
                                                        <td><a href="/pemeliharaan/pekerjaan-detail/{{$inprogress->booknumber}}" class="badge badge-success">Detail</a></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {{-- tab done  --}}
                                <div class="tab-pane fade" id="done">
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
                                                        <td>Klasifikasi</td>
                                                        <td>Status</td>
                                                        <td>Detail</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($pekerjaan->where('status','Done') as $result => $done)    
                                                    <tr>
                                                        <td>{{$done->booknumber}}</td>
                                                        <td>{{$done->nama}}</td>
                                                        <td>{{$done->nik}}</td>
                                                        <td>{{$done->tanggal_pekerjaan}}</td>
                                                        <td>{{$done->tanggal_pelaksanaan}}</td>
                                                        <td>{{$done->getKlasifikasi->klasifikasi_pekerjaan}}</td>
                                                        <td><span class="badge badge-primary">{{$done->status}}</span></td>
                                                        <td><a href="/pemeliharaan/pekerjaan-detail/{{$done->booknumber}}" class="badge badge-success">Detail</a></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {{-- tab closed  --}}
                                <div class="tab-pane fade" id="closed">
                                    <div class="p-t-15">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered zero-configuration" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <td>No Booking</td>
                                                        <td>Nama</td>
                                                        <td>NIK</td>
                                                        <td>Tanggal</td>
                                                        <td>Klasifikasi</td>
                                                        <td>Penilaian</td>
                                                        <td>Status</td>
                                                        <td>Detail</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($pekerjaan->where('status','Closed') as $result => $close)    
                                                    <tr>
                                                        <td>{{$close->booknumber}}</td>
                                                        <td>{{$close->nama}}</td>
                                                        <td>{{$close->nik}}</td>
                                                        <td>{{$close->tanggal_pekerjaan}}</td>
                                                        <td>{{$close->getKlasifikasi->klasifikasi_pekerjaan}}</td>
                                                        <td>{{$close->getPenilaian->nilai}}</td>
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
</div>
@endsection
