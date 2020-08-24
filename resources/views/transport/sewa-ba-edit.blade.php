<style type="text/css">
.style1 {color: #0000FF}
</style>
@extends('layouts.master')
@section('title','Edit Ba Serah Terima Kendaraan Sewa')
@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Ba Serah Terima Kendaraan Sewa</h4>
                    <div class="card-content">
                        <form action="/transport/sewa-ba-update/{{ $editba->id}}" method="post">
                            @csrf
                            <div class="basic-form">
                              <div class="form-group">
                                  <label for="uraian"><span class="style1">Uraian</span></label>
                                  <span class="style1">
                                    <input type="text" name="uraian" id="" class="form-control input-default" placeholder="Uraian" required value="{{ $editba->uraian }}">
                                    </span></div>
                                <div class="form-group style1">
                                    <label for="tgl">Tanggal Berit Acara</label>
                                    <input type="date" name="tgl" id="" class="form-control input-default" placeholder="Tanggal Ba" required value="{{ $editba->tgl }}">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 style1">
                                        <label for="tgl_awal">Tanggal Awal Sewa</label>
                                        <input type="date" name="tgl_awal" id="" class="form-control input-default" placeholder="Tgl. Mulai Sewa" required value="{{ $editba->tgl_awal }}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <span class="style1">
                                        <label for="tgl_akhir">Tanggal Akhir Sewa</label>
                                        </span>
                                        <label for="tgl_akhir"></label>
                                        <input type="date" name="tgl_akhir" id="" class="form-control input-default" placeholder="Tgl Sewa Berakhir" required value="{{ $editba->tgl_akhir }}">
                                    </div>
                                </div>
                                <div class="general-button">
                                    <button type="button" class="btn btn-primary" onclick="window.location.href='/transport/sewa-ba-tampil'">Back</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

