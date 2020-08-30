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
                                <select name="kd_uangmuka" id="kd_uangmuka">

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
            placeholder: 'Pilih Kode Aktifitas',
            allowClear: true
        });
    </script>
@endsection