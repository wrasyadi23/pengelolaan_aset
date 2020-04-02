@extends('layouts.master')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Pekerjaan</h4>
                    <div class="card-content">
                        <form action="/pemeliharaan/pekerjaan-store" method="post">
                            @csrf
                            <div class="basic-form">
                                {{-- combobox dinamis start --}}
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="klasifikasi-area">Klasifikasi Area</label>
                                        <select name="kd_area" id="kd_area" class="form-control input-default">
                                            <option disabled selected></option>
                                            @foreach ($klasifikasi as $index => $item)
                                                <option value="{{$item->kd_area}}">{{$item->klasifikasi_area}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="alamat">Sub Area 1/Alamat</label>
                                        <select name="kd_alamat" id="kd_alamat" class="form-control input-default" disabled></select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="keterangan">Sub Area 2/Keterangan Objek</label>
                                        <select name="kd_keterangan" id="kd_keterangan" class="form-control input-default"></select>
                                    </div>
                                </div>
                                {{-- combobox dinamis end --}}
                                <div class="form-group">
                                    <label for="jenisPekerjaan">Jenis Pekerjaan</label>
                                    <select name="jenisPekerjaan" id="jenisPekerjaan" class="form-control input-default"></select>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan Kerusakan</label>
                                    <textarea name="keterangan" id="" rows="7" class="form-control input-default"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Upload Foto</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
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
        });
        $("#kd_alamat").select2({
            placeholder: 'Pilih Alamat',
            allowClear: true,
            disabled: true
        });
        $("#kd_keterangan").select2({
            placeholder: 'Pilih Alamat',
            allowClear: true,
            disabled: true
        });
        $("#jenisPekerjaan").select2();

        $("#kd_area").change(function () {
            var alamat = "<option disabled selected></option>"
            $.ajax({
                type: "POST",
                url: "/api/get-area",
                data: {
                    kd_area: $("#kd_area").val()
                },
                error: function(e) {
                    console.log(e)
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    for (var x = 0; data.length > x; x++) {
                        alamat += "<option value="+data[x].kd_alamat + ">" + data[x].alamat + "</option>";
                    }
                    console.log(alamat);
                    $("#kd_alamat")
                    .empty()
                    .append(alamat)
                    .prop("disabled", false);
                }
            })
        })

        $("#kd_alamat").change(function () {
            var keterangan = "<option disabled selected></option>"
            $.ajax({
                type: "POST",
                url: "/api/get-keterangan",
                data: {
                    kd_alamat: $("#kd_alamat").val()
                },
                error: function(e) {
                    console.log(e)
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    for (var x = 0; data.length > x; x++) {
                        keterangan += "<option value="+data[x].kd_keterangan + ">" + data[x].keterangan + "</option>";
                    }
                    console.log(keterangan);
                    $("#kd_keterangan")
                    .empty()
                    .append(keterangan)
                    .prop("disabled", false);
                }
            })
        })
    </script>
@endsection