@extends('layouts.master')
@section('title','Uangmuka')
@section('content')
<div class="container-fluid mt-3">
    @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail Uangmuka</h4>
                    <div class="card-content">
                        {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>No. Uangmuka</th>
                                    <td>{{$rawDataUM->no_uangmuka}}</td>
                                </tr>
                                <tr>
                                    <th>Nama / Nik</th>
                                    <td>{{$rawDataUM->getKaryawan->nama}} / {{$rawDataUM->nik}}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>{{$rawDataUM->tgl}}</td>
                                </tr>
                                <tr>
                                    <th>Periode</th>
                                    <td>{{$rawDataUM->tgl_awal}} s/d {{$rawDataUM->tgl_akhir}}</td>
                                </tr>
                                <tr>
                                    <th>Nilai Uangmuka</th>
                                    <td>Rp. {{number_format($rawDataUM->kd_klasifikasi_pekerjaan,2,',','.')}}</td>
                                </tr>
                                <tr>
                                    <th>Uraian</th>
                                    <td>{{$rawDataUM->uraian}}</td>
                                </tr>    
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Catatan</h4>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <th>
                                    <td>No.</td>
                                    <td>Nama</td>
                                    <td>NIK</td>
                                    <td>Tanggal</td>
                                    <td>Catatan</td>
                                </th>
                                @if ($rawDataUM->UangmukaNotes->count() != null)
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($rawDataUM->uangmukaNotes->all() as $notes)    
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$notes->getUangmuka->getKaryawan->nama}}</td>
                                        <td>{{$notes->nik}}</td>
                                        <td>{{$notes->tgl}}</td>
                                        <td>{{$notes->catatan}}</td>
                                        <td>{{$notes->status}}</td>
                                    </tr>
                                    @endforeach    
                                @else
                                    <tr>
                                        <td colspan="5">Tidak ada catatan.</td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                        <div class="general-button">
                            <button class="btn mb-1 btn-primary" type="button" onclick="window.location.href='/transport/uangmuka'">Back</button>
                            @if ($rawDataUM->status == 'Requested')
                                <button class="btn mb-1 btn-primary" type="button" onclick="window.location.href='/transport/uangmuka-edit/{{$rawDataUM->kd_uangmuka}}'">Edit</button>
                                @if (Auth::user()->role == 'Admin')
                                <button class="btn mb-1 btn-success" type="button" onclick="window.location.href='/transport/uangmuka-approve/{{$rawDataUM->kd_uangmuka}}'">Approve</button>
                                @endif
                            @endif
                            @if ($rawDataUM->status == 'Approved' && Auth::user()->role == 'Admin')
                                <button class="btn mb-1 btn-warning" type="button" onclick="window.location.href='/transport/uangmuka-disapprove/{{$rawDataUM->kd_uangmuka}}'">Disapprove</button>
                                <button class="btn mb-1 btn-success" type="button" onclick="window.location.href='/transport/uangmuka-close/{{$rawDataUM->kd_uangmuka}}'">Closed</button>
                            @endif
                            @if ($rawDataUM->whereIn('status',['Requested','Approved']) && Auth::user()->role == 'Admin')
                                <button class="btn mb-1 btn-danger" type="button" onclick="window.location.href='/transport/uangmuka-cancel/{{$rawDataUM->kd_uangmuka}}'">Cancel</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection