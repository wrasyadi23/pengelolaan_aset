@extends('layouts.master')
@section('title','Edit Pekerjaan')
@section('content')
<div class="container-fluid mt-3">
    @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data Pekerjaan</h4>
                    <div class="card-content">
                        <form action="/pemeliharaan/pekerjaan-update/{{$DataPekerjaan->booknumber}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="basic-form">
                                {{-- combobox dinamis start  --}}
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="klasifikasi-area">Klasifikasi Area</label>
                                        <select name="kd_area" id="kd_area" class="form-control input-default" required>
                                            @foreach ($area_klasifikasi as $area => $itemArea)
                                                <option value="{{$itemArea->kd_area}}" {{$itemArea->kd_area == $DataPekerjaan->kd_area ? 'selected' : ''}}>{{$itemArea->klasifikasi_area}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="alamat">Sub Area 1/Alamat</label>
                                        <select name="kd_alamat" id="kd_alamat" class="form-control input-default" required>
                                            @foreach ($dataAlamat as $alamat)
                                                <option value="{{$alamat->kd_alamat}}" {{$alamat->kd_alamat == $DataPekerjaan->kd_alamat ? 'selected' : ''}}>{{$alamat->alamat}}</option>                                                
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="keterangan">Sub Area 2/Keterangan Objek</label>
                                        <select name="kd_keterangan" id="kd_keterangan" class="form-control input-default" required>
                                            @foreach ($dataKeterangan as $areaKeterangan => $itemKeterangan)
                                                <option value="{{$itemKeterangan->kd_keterangan}}" {{$itemKeterangan->kd_keterangan == $DataPekerjaan->kd_keterangan ? 'selected' : ''}}>{{$itemKeterangan->keterangan}}</option>                                                
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- combobox dinamis end --}}
                                <div class="form-group">
                                    <label for="jenisPekerjaan">Jenis Pekerjaan</label>
                                    <select name="kd_klasifikasi_pekerjaan" id="kd_klasifikasi_pekerjaan" class="form-control input-default" required>
                                        @foreach ($pekerjaan_klasifikasi as $pekerjaan => $itemPekerjaan)
                                            <option value="{{$itemPekerjaan->kd_klasifikasi_pekerjaan}}" {{$itemPekerjaan->kd_klasifikasi_pekerjaan == $DataPekerjaan->kd_klasifikasi_pekerjaan ? 'selected' : '' }}>
                                                {{$itemPekerjaan->klasifikasi_pekerjaan}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="telepon">Telepon</label>
                                    <input type="text" name="telepon" id="" class="form-control form-control-sm input-default" value="{{$DataPekerjaan->telepon}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="uraian">Uraian Kerusakan/Error</label>
                                    <textarea name="uraian" id="" rows="7" class="form-control input-default" required>{{$DataPekerjaan->uraian}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Upload Foto</label>
                                    <input type="file" class="form-control input-default" name="foto[]" id="foto[]" multiple> {{-- ditambahkan simbol array[] & multiple agar bisa upload beberapa file --}}
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Foto</th>
                                                <th>Nama File</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if ($DataPekerjaan->getFile->count() != null) {{-- Untuk Cek apakah ada data ber-relasi atau tidak --}}
                                            @foreach ($DataPekerjaan->getFile->all() as $foto)
                                            <tr>
                                                <td>
                                                    <img src="{{asset('pemeliharaan/'.$foto->file)}}" width="150px"><br>
                                                </td>
                                                <td>
                                                    <a href="{{asset('pemeliharaan/'.$foto->file)}}">{{$foto->file}}</a>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger" onclick="window.location.href='/pemeliharaan/pekerjaan-delete-file/{{$foto->id}}'">Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else {{-- Jika tidak ada data ber-relasi, munculkan kode berikut --}}
                                            <tr>
                                                <td colspan="3" align="center">Tidak ada foto yang diunggah</td>
                                            </tr>
                                        @endif
                                            {{-- <tr>
                                                <td><img src="{{asset('pemeliharaan/'.$DataPekerjaan->getFile->file)}}" width="150px"></td>
                                                <td><a href="{{asset('pemeliharaan/'.$DataPekerjaan->getFile->file)}}">{{$DataPekerjaan->getFile->file}}</a></td>
                                                <td><button type="button" class="btn btn-danger" onclick="window.location.href='/pemeliharaan/pekerjaan-delete-file/{{$DataPekerjaan->getFile->id}}'">Delete</button></th>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                                <div class="general-button">
                                    <button type="button" class="btn btn-primary" onclick="window.location.href='/pemeliharaan/pekerjaan-detail/{{$DataPekerjaan->booknumber}}'">Back</button>
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
    $("#kd_area").select2({
        placeholder: 'Pilih Klasifikasi area',
        allowClear: true
    }); // fungsi untuk mengubah dropdown biasa menjadi plugin select2
    $("#kd_alamat").select2({
        placeholder: 'Pilih Alamat',
        allowClear: true
    }); // fungsi untuk mengubah dropdown biasa menjadi plugin select2
    $("#kd_keterangan").select2({
        placeholder: 'Pilih Keterangan Objek',
        allowClear: true
    }); // fungsi untuk mengubah dropdown biasa menjadi plugin select2
    $("#kd_klasifikasi_pekerjaan").select2({
        placeholder: 'Pilih Jenis Pekerjaan',
        allowClear: true
    });

    $("#kd_area").change(function () {
        var alamat = "<option disabled selected></option>"
        $("#kd_alamat")
            .empty()
            .prop("disabled", true);
        $("#kd_keterangan")
            .empty()
            .prop("disabled", true);
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
                .append(alamat) // variable yang berisi tag <option> diassign ke combobox terkait
                .prop("disabled", false);
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
                .append(keterangan) // variable yang berisi tag <option> diassign ke combobox terkait
                .prop("disabled", false);
            }
        })
    })
</script>
@endsection