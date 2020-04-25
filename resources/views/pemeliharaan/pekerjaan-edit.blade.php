@extends('layouts.master')
@section('title','Edit Pekerjaan')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data Pekerjaan</h4>
                    <div class="card-content">
                        <form action="/pemeliharaan/pekerjaan-update/{{$DataPekerjaan->booknumber}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="basic-form">
                                {{-- combobox dinamis start --}}
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="klasifikasi-area">Klasifikasi Area</label>
                                        <select name="kd_area" id="kd_area" class="form-control input-default">
                                            <option value="{{$DataPekerjaan->kd_area}}" selected>{{$DataPekerjaan->getAreaKlasifikasi->klasifikasi_area}}</option>
                                            @foreach ($area_klasifikasi as $area => $itemArea)
                                                <option value="{{$itemArea->kd_area}}">{{$itemArea->klasifikasi_area}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="alamat">Sub Area 1/Alamat</label>
                                        <select name="kd_alamat" id="kd_alamat" class="form-control input-default">
                                            <option value="{{$DataPekerjaan->kd_alamat}}" selected>{{$DataPekerjaan->getAreaAlamat->alamat}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="keterangan">Sub Area 2/Keterangan Objek</label>
                                        <select name="kd_keterangan" id="kd_keterangan" class="form-control input-default">
                                            <option value="{{$DataPekerjaan->kd_keterangan}}" selected>{{$DataPekerjaan->getAreaKeterangan->keterangan}}</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- combobox dinamis end --}}
                                <div class="form-group">
                                    <label for="jenisPekerjaan">Jenis Pekerjaan</label>
                                    <select name="kd_klasifikasi_pekerjaan" id="kd_klasifikasi_pekerjaan" class="form-control input-default">
                                        <option value="{{$DataPekerjaan->kd_klasifikasi_pekerjaan}}" selected>{{$DataPekerjaan->getKlasifikasi->klasifikasi_pekerjaan}}</option>
                                        @foreach ($pekerjaan_klasifikasi as $pekerjaan => $itemPekerjaan)
                                            <option value="{{$itemPekerjaan->kd_klasifikasi_pekerjaan}}">{{$itemPekerjaan->klasifikasi_pekerjaan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="uraian">Uraian Kerusakan/Error</label>
                                    <textarea name="uraian" id="" rows="7" class="form-control input-default">{{$DataPekerjaan->uraian}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Upload Foto</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="foto" id="foto">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <table class="table-responsive table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <td>Foto</td>
                                            <td>Nama File</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img src="{{asset('pemeliharaan/'.$DataPekerjaan->file)}}" alt="" srcset=""></td>
                                            <td>{{$DataPekerjaan->file}}</td>
                                            <td><a href="/pemeliharaan/pemeliharaan-delete-file/{{$DataPekerjaan->booknumber}}" class="badge badge-danger">Delete</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary">Submit</button>
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
        $("#kd_area").select2({
            placeholder: 'Pilih Klasifikasi area',
            allowClear: true
        }); // fungsi untuk mengubah dropdown biasa menjadi plugin select2
        $("#kd_alamat").select2({
            placeholder: 'Pilih Alamat',
            allowClear: true,
            disabled: true
        }); // fungsi untuk mengubah dropdown biasa menjadi plugin select2
        $("#kd_keterangan").select2({
            placeholder: 'Pilih Keterangan Objek',
            allowClear: true,
            disabled: true
        }); // fungsi untuk mengubah dropdown biasa menjadi plugin select2
        $("#kd_klasifikasi_pekerjaan").select2({
            placeholder: 'Pilih Jenis Pekerjaan',
            allowClear: true
        });

        $("#kd_area").change(function () {
            var alamat = "<option disabled selected></option>"
            // $("#kd_alamat")
            //     .empty();
            //     // .prop("disabled", true);
            // $("#kd_keterangan")
            //     .empty();
            //     // .prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "/api/get-area", // memanggil url di controller API/Controller/GetResponse@getAlamat & akan output data JSON
                data: {
                    kd_area: $("#kd_area").val()
                },
                error: function(e) {
                    console.log(e)
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    for (var x = 0; data.length > x; x++) {
                        alamat += "<option value="+data[x].kd_alamat + ">" + data[x].alamat + "</option>"; // data json yang telah dioutput diassign ke variable dalam bentuk tag <option>
                    }
                    console.log(alamat); // ini hanya untuk cek di console browser, apakah data berhasil teroutput?
                    $("#kd_alamat")
                    .empty()
                    .append(alamat); // variable yang berisi tag <option> diassign ke combobox terkait
                    // .prop("disabled", false);
                }
            })
        })

        $("#kd_alamat").change(function () {
            var keterangan = "<option disabled selected></option>"
            $.ajax({
                type: "POST",
                url: "/api/get-keterangan", // memanggil url di controller API/Controller/GetResponse@getAlamat & akan output data JSON
                data: {
                    kd_alamat: $("#kd_alamat").val()
                },
                error: function(e) {
                    console.log(e)
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    for (var x = 0; data.length > x; x++) {
                        keterangan += "<option value="+data[x].kd_keterangan + ">" + data[x].keterangan + "</option>"; // data json yang telah dioutput diassign ke variable dalam bentuk tag <option>
                    }
                    console.log(keterangan); // ini hanya untuk cek di console browser, apakah data berhasil teroutput?
                    $("#kd_keterangan")
                    .empty()
                    .append(keterangan); // variable yang berisi tag <option> diassign ke combobox terkait
                    // .prop("disabled", false);
                }
            })
        })
    </script>
@endsection