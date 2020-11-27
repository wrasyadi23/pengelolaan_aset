<style type="text/css">

.style1 {color: #0000FF}

</style>
@extends('layouts.master')
@section('title','Input Kendaraan Investasi')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Kendaraan Investasi</h4>
                    <div class="card-content">
                        <form action="/transport/kendaraan-invest-store" method="post">
                            @csrf
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for="kd_ba"><span class="style1">Kode Asset</span></label>
                                    <input type="text" name="kd_ba" id="" class="form-control input-default" placeholder="Isi Kode Asset" required>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                      <label for="nopol"><span class="style1">Nopol</span></label>
                                      <span class="style1">
                                        <input type="text" name="nopol" id="" class="form-control input-default" placeholder="Nopol" required>
                                        </span></div>
                                    <div class="form-group col-md-6 style1">
                                        <label for="merk">Merk Kendaraan</label>
                                        <input type="text" name="merk" id="" class="form-control input-default" placeholder="Merk Kendaraan" required>
                                    </div>
                                </div>
                                <div class="form-row style1">
                                    <div class="form-group col-md-4">
                                        <label for="type">Type Kendaraan</label>
                                        <input type="text" name="type" id="" class="form-control input-default" placeholder="Type Kendaraan" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="tahun">Tahun Pembuatan</label>
                                        <input type="text" name="tahun" id="" class="form-control input-default" placeholder="Tahun Pembuatan" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="warna">Warna</label>
                                        <input type="text" name="warna" id="" class="form-control input-default" placeholder="Warna" required>
                                    </div>
                                </div>
                                <div class="form-row style1">
                                    <div class="form-group col-md-4">
                                        <label for="jenis_kend">Jenis Kendaraan</label>
                                        <select name = "jenis_kend" class="form-control input-default">
                                            <option selected="selected">Pilih Jenis Kendaraan</option>
                                            <option value="Sedan">Sedan</option>
                                            <option value="Bus">Bus</option>
                                            <option value="Station">Station</option>
                                            <option value="PickUp">PickUp</option>
                                            <option value="Spdmtr">Sepeda Motor</option>
                                            <option value="Spdmtrroda3">Sepeda Motor Roda 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="jenis_bbm">Jenis BBM</label>
                                        <select name = "jenis_bbm" class="form-control input-default">
                                            <option selected="selected">Pilih Jenis BBM</option>
                                            <option value="PetraMax">PetraMax</option>
                                            <option value="Pertalite">Pertalite</option>
                                            <option value="PeraminaDex">PeraminaDex</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="jml_bbm">Jumlah BBM</label>
                                        <input type="number" name="jml_bbm" id="" class="form-control input-default" placeholder="Jumlah BBM" required>
                                    </div>
                                </div>
                                <div class="form-row style1">
                                    <div class="form-group col-md-4">
                                        <label for="no_bpkb">No. BPKB</label>
                                        <input type="text" name="no_bpkb" id="" class="form-control input-default" placeholder="No BPKB" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="no_stnk">No. STNK</label>
                                        <input type="text" name="no_stnk" id="" class="form-control input-default" placeholder="No STNK" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="no_mesin">No. Mesin</label>
                                        <input type="text" name="no_mesin" id="" class="form-control input-default" placeholder="No Mesin" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 style1">
                                        <label for="nopol">No. Rangka</label>
                                        <input type="text" name="no_rangka" id="" class="form-control input-default" placeholder="No. Rangka" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <span class="style1">
                                            <label for="jenis_sewa">Jenis Sewa</label>
                                        </span>
                                        <label for="jenis_sewa"></label>
                                        <select name = "jenis_sewa" class="form-control input-default">
                                            <option selected="selected">Pilih Jenis Sewa</option>
                                            <option value="SewaSP">SewaSP</option>
                                            <option value="SewaESD">SewaESD</option>
                                            <option value="SewaTA">SewaTA</option>
                                            <option value="Investasi">Investasi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="kd_departemen">Departemen</label>
                                        <select name="kd_departemen" id="kd_departemen" class="form-control input-default" required>
                                            <option disabled selected></option>
                                            @foreach ($departemen as $item)
                                                <option value="{{$item->kd_departemen}}">{{$item->departemen}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="bagian">Bagian</label>
                                        <select name="kd_bagian" id="kd_bagian" class="form-control input-default" disabled required></select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="seksi">Seksi</label>
                                        <select name="kd_seksi" id="kd_seksi" class="form-control input-default" disabled required></select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="regu">Regu</label>
                                        <select name="kd_regu" id="kd_regu" class="form-control input-default" required></select>
                                    </div>
                                </div>
                                <div class="general-button">
                                    <button type="button" class="btn btn-primary" onclick="window.location.href='/transport/kendaraan-tampil'">Back</button>
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
            allowClear : true
        });
        $("#kd_departemen").select2({
            placeholder: 'Pilih Departemen',
            allowClear: true,
        }); // fungsi untuk mengubah dropdown biasa menjadi plugin select2
        $("#kd_bagian").select2({
            placeholder: 'Pilih Bagian',
            allowClear: true,
            disabled: true
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
        });
        $("#kd_departemen").change(function () {
            var bagian = "<option disabled selected></option>"
            $("#kd_bagian")
                .empty()
                .prop("disabled", true);
            $("#kd_seksi")
                .empty()
                .prop("disabled", true);
            $("#kd_regu")
                .empty()
                .prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "/api/get-departemen", // memanggil url di controller API/Controller/GetResponse@getAlamat & akan output data JSON
                data: {
                    kd_departemen: $("#kd_departemen").val()
                },
                error: function(e) {
                    console.log(e)
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    for (var x = 0; data.length > x; x++) {
                        bagian += "<option value="+data[x].kd_bagian + ">" + data[x].bagian + "</option>"; // data json yang telah dioutput diassign ke variable dalam bentuk tag <option>
                    }
                    console.log(bagian); // ini hanya untuk cek di console browser, apakah data berhasil teroutput?
                    $("#kd_bagian")
                    .empty()
                    .append(bagian) // variable yang berisi tag <option> diassign ke combobox terkait
                    .prop("disabled", false);
                }
            })
        })

        $("#kd_bagian").change(function () {
            var seksi = "<option disabled selected></option>"
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