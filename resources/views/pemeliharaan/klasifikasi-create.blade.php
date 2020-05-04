@extends('layouts.master')
@section('title','Klasifikasi Pekerjaan')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Klasifikasi</h4>
                    <div class="card-content">
                        <form action="/pemeliharaan/klasifikasi-store" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="basic-form">
                                {{-- combobox dinamis start --}}
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="bagian">Bagian</label>
                                        <select name="kd_bagian" id="kd_bagian" class="form-control input-default" required>
                                            <option disabled selected></option>
                                            @foreach ($bagian as $itemBagian)
                                                <option value="{{$itemBagian->kd_bagian}}">{{$itemBagian->bagian}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="seksi">Seksi</label>
                                        <select name="kd_seksi" id="kd_seksi" class="form-control input-default" disabled required></select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="regu">Regu</label>
                                        <select name="kd_regu" id="kd_regu" class="form-control input-default" required></select>
                                    </div>
                                </div>
                                {{-- combobox dinamis end --}}
                                <div class="form-group">
                                    <label for="telepon">Klasifikasi Pekerjaan</label>
                                    <input type="text" name="klasifikasi_pekerjaan" id="" class="form-control form-control-sm input-default" required>
                                </div>
                                <div class="general-button">
                                    <button type="button" class="btn btn-primary" onclick="window.location.href='/pemeliharaan/klasifikasi'">Back</button>
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
        $("#kd_bagian").select2({
            placeholder: 'Pilih Bagian',
            allowClear: true
        }); // fungsi untuk mengubah dropdown biasa menjadi plugin select2
        $("#kd_seksi").select2({
            placeholder: 'Pilih Seksi',
            allowClear: true,
            disabled: true
        }); // fungsi untuk mengubah dropdown biasa menjadi plugin select2
        $("#kd_regu").select2({
            placeholder: 'Pilih Regu',
            allowClear: true,
            disabled: true
        }); // fungsi untuk mengubah dropdown biasa menjadi plugin select2


        $("#kd_bagian").change(function () {
            var seksi = "<option disabled selected></option>"
            $("#kd_seksi")
                .empty()
                .prop("disabled", true);
            $("#kd_regu")
                .empty()
                .prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "/api/get-bagian", // memanggil url di controller API/Controller/GetResponse@getAlamat & akan output data JSON
                data: {
                    kd_bagian: $("#kd_bagian").val()
                },
                error: function(e) {
                    console.log(e)
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    for (var x = 0; data.length > x; x++) {
                        seksi += "<option value="+data[x].kd_seksi + ">" + data[x].seksi + "</option>"; // data json yang telah dioutput diassign ke variable dalam bentuk tag <option>
                    }
                    console.log(seksi); // ini hanya untuk cek di console browser, apakah data berhasil teroutput?
                    $("#kd_seksi")
                    .empty()
                    .append(seksi) // variable yang berisi tag <option> diassign ke combobox terkait
                    .prop("disabled", false);
                }
            })
        })

        $("#kd_seksi").change(function () {
            var regu = "<option disabled selected></option>"
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