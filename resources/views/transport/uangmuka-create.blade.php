@extends('layouts.master')
@section('title','Input Uangmuka')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Uangmuka</h4>
                    <div class="card-content">
                        <form action="/transport/uangmuka-store" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for="gl_account">Commit Item/Gl. Account</label>
                                    <select name="kd_aktifitas_rkap" id="kd_aktifitas_rkap" class="form-control input-default" required>
                                        <option disabled selected></option>
                                        @foreach ($rkapDetail as $itemRkap)
                                            <option value="{{$itemRkap->kd_aktifitas_rkap}}">{{$itemRkap->getRkap->gl_acc}} - {{$itemRkap->nama_aktifitas}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="requester">Requester</label>
                                    <select name="nik" id="nik" class="form-control input-default" required>
                                        <option disabled selected></option>
                                        @foreach ($karyawan as $itemKaryawan)
                                            <option value="{{$itemKaryawan->nik}}">{{$itemKaryawan->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="no_uangmuka">Nomor Uangmuka</label>
                                    <input type="text" name="no_uangmuka" id="" class="form-control input-default" required>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="periode">Periode</label>
                                        <input type="date" name="tgl_awal" id="" class="form-control input-default" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="periode">&nbsp;</label>
                                        <input type="date" name="tgl_akhir" id="" class="form-control input-default" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nilai_uangmuka">Nilai Uangmuka</label>
                                    <input type="number" name="nilai_uangmuka" id="" class="form-control input-default" required>
                                </div>
                                <div class="form-group">
                                    <label for="uraian">Uraian</label>
                                    <textarea name="uraian" id="" cols="30" rows="5" class="form-control input-default" required></textarea>
                                </div>
                                <div class="general-button">
                                    <button type="reset" class="btn btn-primary">Reset</button>
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