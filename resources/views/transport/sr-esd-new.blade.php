<style type="text/css">
    .style1 {color: #0066FF}
    </style>
    @extends('layouts.master')
    @section('title','Input Service Request')
    @section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Input Service Request</h4>
                        <div class="card-content">
                            <form action="/transport/sr-simpan" method="post">
                                @csrf
                                <div class="basic-form">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 style1">
                                            <label for="kd_sp">Kode SP</label>
                                            <select name="kd_sp" id="kd_sp" class="form-control input-default">
                                                <option disabled selected></option>
                                                @foreach ($rawDataSP as $item)
                                                    <option value="{{$item->kd_sp}}">{{$item->no_sp}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12 style1">
                                            <label for="kd_tarif">Tarif</label>
                                            <select name="kd_tarif" id="kd_tarif" class="form-control input-default" disabled required></select>
                                        </div>
                                        <div class="form-group col-md-12 style1">
                                            <label for="merk">Merk</label>
                                            <select name="merk" id="merk" class="form-control input-default" required></select>
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="nopol">Tanggal Sr</label>
                                            <input type="date" name="tgl" id="" class="form-control input-default" placeholder="Tanggal Sr" required>
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="merk">Tanggal Awal</label>
                                            <input type="date" name="tgl_awal" id="" class="form-control input-default" placeholder="Tanggal Awal Sr" required>
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="type">Tangal Akhir</label>
                                            <input type="date" name="tgl_akhir" id="" class="form-control input-default" placeholder="Tangal Akhir Sr " required>
                                        </div>
                                    </div>

                                    <div class="general-button">
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='/transport/sr-tampil'">Back</button>
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
            $("#kd_sp").select2({
                placeholder: 'Pilih Nomor SP',
                allowClear : true
            });

            $("#kd_tarif").select2({
                placeholder: 'Pilih Tarif',
                allowClear: true,
                disabled: true
            });

            $("#merk").select2({
                placeholder: 'Pilih Merk',
                allowClear: true,
                disabled: true
            });

        $("#kd_sp").change(function () {
            var kd_ba = "<option disabled selected></option>"
            $("#kd_tarif")
                .empty()
                .prop("disabled", true);
            $("#merk")
                .empty()
                .prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "/api/get-tarif", // memanggil url di controller API/Controller/GetResponse@getAlamat & akan output data JSON
                data: {
                    kd_sp: $("#kd_sp").val()
                },
                error: function(e) {
                    console.log(e)
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    for (var x = 0; data.length > x; x++) {
                        kd_tarif += "<option value="+data[x].kd_tarif + ">" + data[x].kd_tarif + "</option>"; // data json yang telah dioutput diassign ke variable dalam bentuk tag <option>
                    }
                    console.log(kd_tarif); // ini hanya untuk cek di console browser, apakah data berhasil teroutput?
                    $("#kd_tarif")
                    .empty()
                    .append(kd_tarif) // variable yang berisi tag <option> diassign ke combobox terkait
                    .prop("disabled", false);
                }
            })
        });
        $("#kd_tarif").change(function () {
            var merk = "<option disabled selected></option>"
            $.ajax({
                type: "POST",
                url: "/api/get-merk", // memanggil url di controller API/Controller/GetResponse@getAlamat & akan output data JSON
                data: {
                    kd_sp: $("#kd_tarif").val()
                },
                error: function(e) {
                    console.log(e)
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    for (var x = 0; data.length > x; x++) {
                        merk += "<option value="+data[x].merk + ">" + data[x].merk + "</option>"; // data json yang telah dioutput diassign ke variable dalam bentuk tag <option>
                    }
                    console.log(merk); // ini hanya untuk cek di console browser, apakah data berhasil teroutput?
                    $("#merk")
                    .empty()
                    .append(merk) // variable yang berisi tag <option> diassign ke combobox terkait
                    .prop("disabled", false);
                }
            })
        });
        </script>

    @endsection
