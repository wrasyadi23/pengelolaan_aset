@extends('layouts.master')
@section('title','Detail Pekerjaan')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail Pekerjaan</h4>
                    <div class="card-content">
                        {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Book Number</th>
                                <td>{{$DetailPekerjaan->booknumber}}</td>
                            </tr>
                            <tr>
                                <th>Nama / Nik</th>
                                <td>{{$DetailPekerjaan->nama}} / {{$DetailPekerjaan->nik}}</td>
                            </tr>
                            <tr>
                                <th>Klasifikasi Pekerjaan</th>
                                <td>{{$DetailPekerjaan->kd_klasifikasi_pekerjaan}} - {{$DetailPekerjaan->getKlasifikasi->klasifikasi_pekerjaan}}</td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td>{{$DetailPekerjaan->tanggal_pekerjaan}}</td>
                            </tr>
                            <tr>
                                <th>Jadwal Sementara</th>
                                <td>{{$DetailPekerjaan->tanggal_pelaksanaan}}</td>
                            </tr>
                            <tr>
                                <th>Uraian</th>
                                <td>{{$DetailPekerjaan->uraian}}</td>
                            </tr>
                            <tr>
                                <th>Foto</th>
                                <td><a href="{{asset('pemeliharaan/'.$DetailPekerjaan->file)}}">{{$DetailPekerjaan->file}}</a></td>
                            </tr>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection