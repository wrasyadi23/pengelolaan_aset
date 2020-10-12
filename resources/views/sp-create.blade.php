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
                        <form action="/sp-store" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="basic-form">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="cost_center">Cost Center</label>
                                        <input type="text" name="cost_center" id="" class="form-control input-default" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="gl_acc">Gl. Account</label>
                                        <input type="text" name="gl_acc" id="" class="form-control input-default" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="tgl">Tanggal</label>
                                        <input type="date" name="tgl" id="" class="form-control input-default" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="jml">Jumlah</label>
                                        <input type="number" name="jml" id="" class="form-control input-default" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="satuan">Satuan</label>
                                        <input type="text" name="satuan" id="" class="form-control input-default" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="harga">Harga</label>
                                        <input type="number" name="harga" id="" class="form-control input-default" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" name="deskripsi" id="" class="form-control input-default" required>
                                </div>
                                <div class="form-group">
                                    <label for="uraian">Uraian</label>
                                    <input type="text" name="uraian" id="" class="form-control input-default" required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" id="" class="form-control input-default" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_sp">Nomor Kontrak/SP</label>
                                    <input type="text" name="no_sp" id="" class="form-control input-default" required>
                                </div>
                                <div class="form-group">
                                    <label for="rekanan">Rekanan/Vendor</label>
                                    <input type="text" name="rekanan" id="" class="form-control input-default" required>
                                </div>
                                <div class="general-button">
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