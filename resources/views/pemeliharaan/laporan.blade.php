@extends('layouts.master')
@section('title','Laporan Kegiatan')
@section('content')
<div class="container-fluid mt-3">
    {{-- @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
@endif --}}
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <h4 class="card-title">Laporan Kegiatan</h4>
                </div>
                <div class="card-content">
                    <div class="basic-form">
                        <form name="laporan" action="/pemeliharaan/laporan-search" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-5">
                                    <input type="date" name="start" id="" class="form-control input-default">
                                </div>
                                <div class="col-sm-5">
                                    <input type="date" name="end" id="" class="form-control input-default">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Seksi</label>
                                <div class="col-sm-10">
                                    <select name="kd_seksi" id="kd_seksi" class="form-control input-default">
                                        <option disabled selected></option>
                                        @foreach ($seksi as $result => $itemseksi)
                                            <option value="{{$itemseksi->kd_seksi}}">{{$itemseksi->seksi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Regu</label>
                                <div class="col-sm-10">
                                    <select name="kd_regu" id="kd_regu" class="form-group input-default"></select>
                                </div>
                            </div>
                            <div class="general-button">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
</div>
@endsection

@section('script')
    <script>
        $("#kd_seksi").select2({
            width: '100%',
            placeholder: 'Pilih Seksi',
            allowClear: true,
        }); // fungsi untuk mengubah dropdown biasa menjadi plugin select2
        $("#kd_regu").select2({
            width: '100%',
            placeholder: 'Pilih Regu',
            allowClear: true,
            disabled: true
        });

        $("#kd_seksi").change(function () {
            var regu = "<option disabled selected></option>"
            $("#kd_regu")
                .empty()
                .prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "/api/get-seksi", // memanggil url di controller API/Controller/GetResponse@getAlamat & akan output data JSON
                data: {
                    kd_seksi: $("#kd_seksi").val()
                },
                error: function(e) {
                    console.log(e)
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    for (var x = 0; data.length > x; x++) {
                        regu += "<option value="+data[x].kd_regu + ">" + data[x].regu + "</option>"; // data json yang telah dioutput diassign ke variable dalam bentuk tag <option>
                    }
                    console.log(regu); // ini hanya untuk cek di console browser, apakah data berhasil teroutput?
                    $("#kd_regu")
                    .empty()
                    .append(regu) // variable yang berisi tag <option> diassign ke combobox terkait
                    .prop("disabled", false);
                }
            })
        })
    </script>
@endsection