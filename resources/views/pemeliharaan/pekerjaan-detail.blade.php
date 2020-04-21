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
                        <div class="basic-form">
                            <div class="form-group row">
                                <label for="booknumber" class="col-sm-3 col-form-label">Book Number</label>
                                <div class="col-sm-9">
                                    <input type="text" name="" id="" class="form-control-plaintext" value="{{$DetailPekerjaan->booknumber}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="booknumber" class="col-sm-3 col-form-label">Nama / NIK</label>
                                <div class="col-sm-9">
                                    <input type="text" name="" id="" class="form-control-plaintext" value="{{$DetailPekerjaan->nama}} / {{$DetailPekerjaan->nik}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="booknumber" class="col-sm-3 col-form-label">Klasifikasi Pekerjaan</label>
                                <div class="col-sm-9">
                                    <input type="text" name="" id="" class="form-control-plaintext" value="{{$DetailPekerjaan->kd_klasifikasi_pekerjaan}} - {{$DetailPekerjaan->getKlasifikasi->klasifikasi_pekerjaan}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="booknumber" class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="text" name="" id="" class="form-control-plaintext" value="{{$DetailPekerjaan->tanggal_pekerjaan}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="booknumber" class="col-sm-3 col-form-label">Jadwal Sementara</label>
                                <div class="col-sm-9">
                                    <input type="text" name="" id="" class="form-control-plaintext" value="{{$DetailPekerjaan->tanggal_pelaksanaan}}" readonly>
                                </div>
                            </div>
                            {{-- error disini bang, gamau rata kiri  --}}
                            <div class="form-group row">
                                <label for="booknumber" class="col-sm-3 col-form-label">Uraian</label>
                                <div class="col-sm-9">
                                    <textarea name="" id="" rows="7" class="form-control-plaintext text-left" readonly>
                                        {{$DetailPekerjaan->uraian}}
                                    </textarea>
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