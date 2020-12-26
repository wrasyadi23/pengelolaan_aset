@extends('layouts.master')
@section('title','Data Pekerjaan')
@section('content')
<div class="container-fluid mt-3">
    @if (session('message-success'))
        <div class="alert alert-success">{{session('message-success')}}</div>
    @elseif (session('message-success-approve'))
        <div class="alert alert-success">{{session('message-success-approve')}}</div>
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
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#inprogress">In Progress ({{$pekerjaan->where('status', 'In progress')->count()}})</a>
                                </li>
                                {{-- only admin and worker who can see done tab  --}}
                                @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Worker')    
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#done">Done ({{$pekerjaan->where('status', 'Done')->count()}})</a>
                                </li>
                                @endif
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
                                                @foreach ($pekerjaan->where('status','Approved') as $result => $item)    
                                                    <tr>
                                                        <td>{{$item->booknumber}}</td>
                                                        <td>{{$item->nama}}</td>
                                                        <td>{{$item->nik}}</td>
                                                        <td>{{$item->tanggal_pekerjaan}}</td>
                                                        <td>{{$item->tanggal_pelaksanaan}}</td>
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
                                                @foreach ($pekerjaan->where('status','In Progress') as $result => $item)    
                                                    <tr>
                                                        <td>{{$item->booknumber}}</td>
                                                        <td>{{$item->nama}}</td>
                                                        <td>{{$item->nik}}</td>
                                                        <td>{{$item->tanggal_pekerjaan}}</td>
                                                        <td>{{$item->tanggal_pelaksanaan}}</td>
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
                                                @foreach ($pekerjaan->where('status','Done') as $result => $item)    
                                                    <tr>
                                                        <td>{{$item->booknumber}}</td>
                                                        <td>{{$item->nama}}</td>
                                                        <td>{{$item->nik}}</td>
                                                        <td>{{$item->tanggal_pekerjaan}}</td>
                                                        <td>{{$item->tanggal_pelaksanaan}}</td>
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
                                                @foreach ($pekerjaan->where('status','Done') as $result => $item)    
                                                    <tr>
                                                        <td>{{$item->booknumber}}</td>
                                                        <td>{{$item->nama}}</td>
                                                        <td>{{$item->nik}}</td>
                                                        <td>{{$item->tanggal_pekerjaan}}</td>
                                                        <td>{{$item->getKlasifikasi->klasifikasi_pekerjaan}}</td>
                                                        <td>{{$item->getRating->nilai}}</td>
                                                        <td><span class="badge badge-primary">{{$item->status}}</span></td>
                                                        <td><a href="/pemeliharaan/pekerjaan-detail/{{$item->booknumber}}" class="badge badge-success">Detail</a></td>
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