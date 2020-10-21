@extends('layouts.master')
@section('title','Kontrak/SP')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Kontrak</h4>
                    <div class="card-content">
                        <form action="/sp-update/{{}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="basic-form">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="cost_center">Cost Center</label>
                                        <select name="cost_center" id="cost_center"
                                                class="form-control input-default" required>
                                            <option disabled selected></option>
                                            @foreach ($rkap as $item)
                                                <option value="{{$item->cost_center}}">{{$item->cost_center}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="gl_acc">Gl. Account</label>
                                        <select name="gl_acc" id="gl_acc" class="form-control input-default"
                                                disabled required></select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="kd_aktifitas_rkap">Aktifitas</label>
                                        <select name="kd_aktifitas_rkap" id="kd_aktifitas_rkap"
                                                class="form-control input-default" required></select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="tgl">Tanggal</label>
                                        <input type="date" name="tgl" id="" class="form-control input-default"
                                                required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="jml">Jumlah</label>
                                        <input type="number" name="jml" id="" class="form-control input-default"
                                                required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="satuan">Satuan</label>
                                        <input type="text" name="satuan" id="" class="form-control input-default"
                                                required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="harga">Harga</label>
                                        <input type="number" name="harga" id="" class="form-control input-default"
                                                required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" name="deskripsi" id="" class="form-control input-default"
                                            required>
                                </div>
                                <div class="form-group">
                                    <label for="uraian">Uraian</label>
                                    <input type="text" name="uraian" id="" class="form-control input-default"
                                            required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" id="" class="form-control input-default"
                                            required>
                                </div>
                                <div class="form-group">
                                    <label for="no_sp">Nomor Kontrak/SP</label>
                                    <input type="text" name="no_sp" id="" class="form-control input-default"
                                            required>
                                </div>
                                <div class="form-group">
                                    <label for="rekanan">Rekanan/Vendor</label>
                                    <input type="text" name="rekanan" id="" class="form-control input-default"
                                            required>
                                </div>
                                <div class="form-group">
                                    <label for="file">File Kontrak/Dokumen terkait</label>
                                    <input type="file" name="dokumen[]" id="dokumen[]" class="form-control input-default"
                                            multiple>
                                </div>
                                <div class="general-button">
                                    <button type="button" class="btn btn-primary"
                                            onclick="window.location.href='/sp'">Back
                                    </button>
                                    <button type="reset" class="btn btn-warning">Reset</button>
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
@section('script')
    
@endsection