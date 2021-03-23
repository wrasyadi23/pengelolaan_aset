<style type="text/css">

.style1 {color: #0000FF}

</style>
@extends('layouts.master')
@section('title','Edit Ptk Perjaka')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit PTK Perjaka</h4>
                    <div class="card-content">
                        <form action="/transport/umperjaka-ptk-store" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for="gl_account"><span class="style1">Commit Item/Gl. Account</span></label>
                                    <select name="kd_aktifitas_rkap" id="kd_aktifitas_rkap" class="form-control input-default" required>
                                        @foreach ($rkapDetail as $itemRkap)
                                            <option value="{{$itemRkap->kd_aktifitas_rkap}}" @if ($itemRkap->kd_aktifitas_rkap == $editptk->kd_aktifitas_rkap) selected @endif>{{$itemRkap->getRkap->gl_acc}} - {{$itemRkap->nama_aktifitas}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="requester"><span class="style1">Requester</span></label>
                                    <select name="nik" id="nik" class="form-control input-default" required>    
                                        @foreach ($karyawan as $itemKaryawan)
                                            <option value="{{$itemKaryawan->nik}}" @if ($itemKaryawan->nik == $editptk->nik) selected @endif>{{$itemKaryawan->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="uraian"><span class="style1">Uraian</span></label>
                                <textarea name="uraian" id="" cols="30" rows="5" class="form-control input-default" required>{{$editptk->uraian}}</textarea>
                                </div>
                                <div class="general-button">
                                    <button type="button" class="btn btn-primary" onclick="window.location.href='/transport/umperjaka-ptk-index'">Back</button>
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
    <script>
        $("#kd_aktifitas_rkap").select2({
            placeholder: 'Pilih Commit Item/Gl. Account',
            allowClear: true
        });
        $("#nik").select2({
            placeholder: 'Pilih Requester',
            allowClear: true
        });
    </script>
@endsection