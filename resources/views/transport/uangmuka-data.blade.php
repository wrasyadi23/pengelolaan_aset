@extends('layouts.master')
@section('title','Data Uangmuka')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Uangmuka</h4>
                    <div class="card-content">
                        <form action="" method="get" enctype="multipart/form-data">
                        @csrf
                        <div class="basic-form">
                            <div class="form-group">
                                <label for="kd_uangmuka">Kode Uangmuka</label>
                                <select name="kd_uangmuka" id="kd_uangmuka" class="form-control input-default">
                                    <option disabled selected></option>
                                    @foreach ($rawDataUM as $result => $itemUM)
                                        <option value="{{$itemUM->kd_uangmuka}}">{{$itemUM->no_uangmuka}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gl_account">Gl. Account</label>
                                <select name="gl_account" id="gl_account" class="form-control input-default">
                                    <option disabled selected></option>
                                    @foreach ($rawDataUM as $item)
                                        <option value="{{$item->kd_uangmuka}}">{{$item->no_uangmuka}}</option>
                                    @endforeach
                                </select>
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
        $("#kd_uangmuka").select2({
            placeholder: 'Pilih No. Uangmuka',
            allowClear: true
        });
        $("#gl_account").select2({
            placeholder: 'Pilih GL. Account',
            allowClear: true
        });
        $("#kd_aktifitas_rkap").select2({
            placeholder: 'Pilih Aktifitas',
            allowClear: true,
            disabled: true
        });
    </script>
@endsection