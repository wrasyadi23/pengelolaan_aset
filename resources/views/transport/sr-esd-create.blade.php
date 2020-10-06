<style type="text/css">
    .style1 {
        color: #0066FF
    }
</style>
@extends('layouts.master')
@section('title','Input Service Request ESD')
@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Input Service Request ESD</h4>
                        <div class="card-content">
                            <form action="/transport/sr-simpan" method="post">
                                @csrf
                                <div class="basic-form">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 style1">
                                            <label for="kd_sp">Kode BA</label>
                                            <select name="kd_ba" id="kd_ba" class="form-control input-default">
                                                <option disabled selected></option>
                                                @foreach ($rawDataBA as $item)
                                                    <option value="{{$item->kd_ba}}">{{$item->no_ba}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12 style1">
                                            <label for="jenis_kend">Jenis Kendaraan</label>
                                            <select name="jenis_kend" id="jenis_kend" class="form-control input-default"
                                                    disabled required></select>
                                        </div>
                                        <div class="form-group col-md-12 style1">
                                            <label for="merk">Merk</label>
                                            <select name="merk" id="merk" class="form-control input-default" disabled
                                                    required></select>
                                        </div>
                                        <div class="form-group col-md-12 style1">
                                            <label for="klasifiksai_tarif">Klasifikasi Tarif</label>
                                            <select name="tarif" id="tarif" class="form-control input-default"
                                                    required></select>
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="nopol">Tanggal Sr</label>
                                            <input type="date" name="tgl" id="" class="form-control input-default"
                                                   placeholder="Tanggal Sr" required>
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="merk">Tanggal Awal</label>
                                            <input type="date" name="tgl_awal" id="" class="form-control input-default"
                                                   placeholder="Tanggal Awal Sr" required>
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="type">Tangal Akhir</label>
                                            <input type="date" name="tgl_akhir" id="" class="form-control input-default"
                                                   placeholder="Tangal Akhir Sr " required>
                                        </div>
                                    </div>

                                    <div class="general-button">
                                        <button type="button" class="btn btn-primary"
                                                onclick="window.location.href='/transport/sr-tampil'">Back
                                        </button>
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
        $("#kd_ba").select2({
            placeholder: 'Pilih Nomor BA',
            allowClear: true
        });
        $("#jenis_kend").select2({
            placeholder: 'Pilih Jenis Kendaraan',
            allowClear: true,
            disabled: true
        });
        $("#merk").select2({
            placeholder: 'Pilih Merk',
            allowClear: true,
            disabled: true
        });
        $("#tarif").select2({
            placeholder: 'Pilih Klasifikasi Tarif',
            allowClear: true,
            disabled: true
        });

        $("#kd_ba").change(function () {
            var kd_jenis_kend = "<option disabled selected></option>"
            $("#jenis_kend")
                .empty()
                .prop("disabled", true);
            $("#merk")
                .empty()
                .prop("disabled", true);
            $("#tarif")
                .empty()
                .prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "/api/get-jenis-kend", // memanggil url di controller API/Controller/GetResponse@getAlamat & akan output data JSON
                data: {
                    kd_ba: $("#kd_ba").val()
                },
                error: function (e) {
                    console.log(e)
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    for (var x = 0; data.length > x; x++) {
                        kd_jenis_kend += "<option value='" + data[x].jenis_kend + "'>" + data[x].jenis_kend + "</option>"; // data json yang telah dioutput diassign ke variable dalam bentuk tag <option>
                    }
                    console.log(response); // ini hanya untuk cek di console browser, apakah data berhasil teroutput?
                    $("#jenis_kend")
                        .empty()
                        .append(kd_jenis_kend) // variable yang berisi tag <option> diassign ke combobox terkait
                        .prop("disabled", false);
                }
            })
        })
        $("#jenis_kend").change(function () {
            var merk = "<option disabled selected></option>"
            $.ajax({
                type: "POST",
                url: "/api/get-merk", // memanggil url di controller API/Controller/GetResponse@getAlamat & akan output data JSON
                data: {
                    jenis_kend: $("#jenis_kend").val()
                },
                error: function (e) {
                    console.log(e)
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    for (var x = 0; data.length > x; x++) {
                        merk += "<option value='" + data[x].merk + "'>" + data[x].merk + "</option>"; // data json yang telah dioutput diassign ke variable dalam bentuk tag <option>
                    }
                    console.log(merk); // ini hanya untuk cek di console browser, apakah data berhasil teroutput?
                    $("#merk")
                        .empty()
                        .append(merk) // variable yang berisi tag <option> diassign ke combobox terkait
                        .prop("disabled", false);
                }
            })
        })
        $("#merk").change(function () {
            var tarif = "<option disabled selected></option>"
            $.ajax({
                type: "POST",
                url: "/api/get-tarif", // memanggil url di controller API/Controller/GetResponse@getAlamat & akan output data JSON
                data: {
                    merk: $("#merk").val()
                },
                error: function (e) {
                    console.log(e)
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    console.log(data);
                    for (var x = 0; data.length > x; x++) {
                        tarif += "<option value='" + data[x].kd_tarif + "'>" + data[x].klasifikasi_tarif + "</option>"; // data json yang telah dioutput diassign ke variable dalam bentuk tag <option>
                    }
                    console.log(data); // ini hanya untuk cek di console browser, apakah data berhasil teroutput?
                    $("#tarif")
                        .empty()
                        .append(tarif) // variable yang berisi tag <option> diassign ke combobox terkait
                        .prop("disabled", false);
                }
            })
        })
    </script>

@endsection
