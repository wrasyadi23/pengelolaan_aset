@extends('layouts.master')
@section('title','Detail Pekerjaan')
@section('content')
<div class="container-fluid mt-3">
    @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
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
                                <th rowspan="3">Area</th>
                                <td>{{$DetailPekerjaan->kd_area}} - {{$DetailPekerjaan->getAreaKlasifikasi->klasifikasi_area}}</td>
                            </tr>
                            <tr>
                                <td>{{$DetailPekerjaan->kd_alamat}} - {{$DetailPekerjaan->getAreaAlamat->alamat}}</td>
                            </tr>
                            <tr>
                                <td>{{$DetailPekerjaan->kd_keterangan}} - {{$DetailPekerjaan->getAreaKeterangan->keterangan}}</td>
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
                            @if ($DetailPekerjaan->getFile->count() != null) {{-- Kondisi untuk Cek apakah ada data ber-relasi atau tidak --}}
                            <tr>
                                <th rowspan="{{$DetailPekerjaan->getFile->count() + 1}}">Foto</th>
                                @foreach ($DetailPekerjaan->getFile->all() as $foto)
                                <tr>
                                    <td>
                                        <img src="{{asset('pemeliharaan/'.$foto->file)}}" width="150px"><br>
                                        <a href="{{asset('pemeliharaan/'.$foto->file)}}">{{$foto->file}}</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tr>
                            @else {{-- Jika tidak ada data ber-relasi, munculkan kode berikut --}}
                            <tr>
                                <th>Foto</th>
                                <td>Tidak ada foto yang diupload</td>
                            </tr>
                            @endif

                        </table>
                        <div class="general-button">
                            <button class="btn mb-1 btn-primary" type="button" onclick="window.location.href='/pemeliharaan/pekerjaan'">Back</button>
                            @if ($DetailPekerjaan->status == 'Requested')
                            <button class="btn mb-1 btn-primary" type="button" onclick="window.location.href='/pemeliharaan/pekerjaan-edit/{{$DetailPekerjaan->booknumber}}'">Edit</button>
                                <button class="btn mb-1 btn-success" type="button" onclick="window.location.href='/pemeliharaan/pekerjaan-approve/{{$DetailPekerjaan->booknumber}}'">Approve</button>
                            @endif
                            @if ($DetailPekerjaan->status == 'Approved')
                            <button class="btn mb-1 btn-warning" type="button" onclick="window.location.href='/pemeliharaan/pekerjaan-disapprove/{{$DetailPekerjaan->booknumber}}'">Disapprove</button>
                            <button class="btn mb-1 btn-success" type="button" onclick="window.location.href='/pemeliharaan/pekerjaan-close/{{$DetailPekerjaan->booknumber}}'">Closed</button>
                            @endif
                            <button class="btn mb-1 btn-danger" type="button" onclick="window.location.href='/pemeliharaan/pekerjaan-cancel/{{$DetailPekerjaan->booknumber}}'">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection