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
                                    <div class="form-group col-md-4">
                                        <label for="cost_center">Cost Center</label>
                                        <select name="cost_center" id="cost_center"
                                                class="form-control input-default" required>
                                            <option disabled selected></option>
                                            @foreach ($rkap as $item)
                                                <option value="{{$item->cost_center}}">{{$item->cost_center}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="gl_acc">Gl. Account</label>
                                        <select name="gl_acc" id="gl_acc" class="form-control input-default"
                                                disabled required></select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="kd_aktifitas_rkap">Aktifitas</label>
                                        <select name="kd_aktifitas_rkap" id="kd_aktifitas_rkap"
                                                class="form-control input-default" required></select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="tgl">Tanggal</label>
                                        <input type="date" name="tgl" id="" class="form-control input-default"
                                                required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="jml">Jumlah</label>
                                        <input type="number" name="jml" id="" class="form-control input-default"
                                                required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="satuan">Satuan</label>
                                        <input type="text" name="satuan" id="" class="form-control input-default"
                                                required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="harga">Harga</label>
                                        <input type="number" name="harga" id="" class="form-control input-default"
                                                required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" name="deskripsi" id="" class="form-control input-default"
                                            required>
                                </div>
                                <div class="form-group">
                                    <label for="uraian">Uraian</label>
                                    <input type="text" name="uraian" id="" class="form-control input-default"
                                            required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" id="" class="form-control input-default"
                                            required>
                                </div>
                                <div class="form-group">
                                    <label for="no_sp">Nomor Kontrak/SP</label>
                                    <input type="text" name="no_sp" id="" class="form-control input-default"
                                            required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_sp">Jenis Kontrak</label>
                                    <select name="jenis_sp" id="jenis_sp" class="form-control input-default" required>
                                        <option selected></option>
                                        <option value="Tetap">Sewa Tetap</option>
                                        <option value="Isidentil">Sewa Isidentil</option>
                                        <option value="TA/Crash Program">Sewa TA/Crash Program</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="rekanan">Rekanan/Vendor</label>
                                    <input type="text" name="rekanan" id="" class="form-control input-default"
                                            required>
                                </div>
                                <div class="form-group">
                                    <label for="file">File Kontrak/Dokumen terkait</label>
                                    <input type="file" name="dokumen[]" id="dokumen[]" class="form-control input-default"
                                            multiple>
                                </div>
                                <div class="general-button">
                                    <button type="button" class="btn btn-primary"
                                            onclick="window.location.href='/sp'">Back
                                    </button>
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
    <script>
        $("#cost_center").select2({
            placeholder: 'Pilih Cost Center',
            allowClear: true
        });
        $("#gl_acc").select2({
            placeholder: 'Pilih Commit Item/Gl. Account',
            allowClear: true,
            disabled: true
        });
        $("#kd_aktifitas_rkap").select2({
            placeholder: 'Pilih Kode Aktifitas',
            allowClear: true,
            disabled: true
        });
        $("#jenis_sp").select2({
            placeholder: 'Pilih Jenis Kontrak',
            allowClear: true
        });
        $("#cost_center").change(function () {
            var gl_acc = "<option disabled selected></option>"
            $("#gl_acc")
                .empty()
                .prop("disabled", true);
            $("#kd_aktifitas_rkap")
                .empty()
                .prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "/api/get-gl-acc", // memanggil url di controller API/Controller/GetResponse@getAlamat & akan output data JSON
                data: {
                    cost_center: $("#cost_center").val()
                },
                error: function (e) {
                    console.log(e)
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    for (var x = 0; data.length > x; x++) {
                        gl_acc += "<option value=" + data[x].kd_rkap + ">" + data[x].gl_acc + " - " + data[x].uraian +"</option>"; // data json yang telah dioutput diassign ke variable dalam bentuk tag <option>
                    }
                    console.log(data); // ini hanya untuk cek di console browser, apakah data berhasil teroutput?
                    $("#gl_acc")
                        .empty()
                        .append(gl_acc) // variable yang berisi tag <option> diassign ke combobox terkait
                        .prop("disabled", false);
                }
            })
        })

        $("#gl_acc").change(function () {
            var kd_aktifitas_rkap = "<option disabled selected></option>"
            $.ajax({
                type: "POST",
                url: "/api/get-kd-aktifitas-rkap", // memanggil url di controller API/Controller/GetResponse@getAlamat & akan output data JSON
                data: {
                    gl_acc: $("#gl_acc").val()
                },
                error: function (e) {
                    console.log(e)
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    for (var x = 0; data.length > x; x++) {
                        kd_aktifitas_rkap += "<option value=" + data[x].kd_aktifitas_rkap + ">" + data[x].uraian + "</option>"; // data json yang telah dioutput diassign ke variable dalam bentuk tag <option>
                    }
                    console.log(kd_aktifitas_rkap); // ini hanya untuk cek di console browser, apakah data berhasil teroutput?
                    $("#kd_aktifitas_rkap")
                        .empty()
                        .append(kd_aktifitas_rkap) // variable yang berisi tag <option> diassign ke combobox terkait
                        .prop("disabled", false);
                }
            })
        })
    </script>
@endsection