@extends('layouts.master')
@section('title','Edit Pekerjaan')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data Pekerjaan</h4>
                    <div class="card-content">
                        <form action="/pemeliharaan/pekerjaan-update/" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="basic-form">
                                {{-- combobox dinamis start --}}
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="klasifikasi-area">Klasifikasi Area</label>
                                        <select name="kd_area" id="kd_area" class="form-control input-default">
                                            <option disabled selected></option>
                                            @foreach ($area_klasifikasi as $area => $itemArea)
                                                <option value="{{$itemArea->kd_area}}">{{$itemArea->klasifikasi_area}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="alamat">Sub Area 1/Alamat</label>
                                        <select name="kd_alamat" id="kd_alamat" class="form-control input-default" disabled></select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="keterangan">Sub Area 2/Keterangan Objek</label>
                                        <select name="kd_keterangan" id="kd_keterangan" class="form-control input-default"></select>
                                    </div>
                                </div>
                                {{-- combobox dinamis end --}}
                                <div class="form-group">
                                    <label for="jenisPekerjaan">Jenis Pekerjaan</label>
                                    <select name="kd_klasifikasi_pekerjaan" id="kd_klasifikasi_pekerjaan" class="form-control input-default">
                                        <option disabled selected></option>
                                        @foreach ($pekerjaan_klasifikasi as $pekerjaan => $itemPekerjaan)
                                            <option value="{{$itemPekerjaan->kd_klasifikasi_pekerjaan}}">{{$itemPekerjaan->klasifikasi_pekerjaan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="uraian">Uraian Kerusakan/Error</label>
                                    <textarea name="uraian" id="" rows="7" class="form-control input-default"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Upload Foto</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="foto" id="foto">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection