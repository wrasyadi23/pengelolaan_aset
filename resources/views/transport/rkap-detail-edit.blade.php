<style type="text/css">
    .style1 {color: #0066FF}
    </style>
    @extends('layouts.master')
    @section('title','Edit RKAP Detail')
    @section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit R K A P Detail</h4>
                        <div class="card-content">
                            <form action="/transport/rkap-detail-update/{{ $editrkap->kd_aktifitas_rkap }}" method="post">
                                @csrf
                                <div class="basic-form">
                                    <div class="form-group style1">
                                        <label for="aktifitas">Aktifitas</label>
                                        <input type="text" name="aktifitas" id="" class="form-control input-default" placeholder="Isi Aktifitas" required value="{{ $editrkap->aktifitas }}">
                                    </div>
                                    <div class="form-group style1">
                                        <label for="nama_aktifitas">Nama Aktifitas</label>
                                        <input type="text" name="nama_aktifitas" id="" class="form-control input-default" placeholder="Isi Nama Aktifitas" required required value="{{ $editrkap->nama_aktifitas }}">
                                    </div>
                                    <div class="form-group style1">
                                        <label for="uraian">Uraian</label>
                                        <input type="text" name="uraian" id="" class="form-control input-default" placeholder="Uraian" required required value="{{ $editrkap->uraian }}">
                                    </div>
                                    <div class="form-group style1">
                                        <label for="nilai_aktifitas">Nilai Aktifitas</label>
                                        <input type="text" name="nilai_aktifitas" id="" class="form-control input-default" placeholder="Nilai Aktifitas" required required value="{{ $editrkap->nilai_aktifitas }}">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 style1">
                                            <label for="kd_bagian">Bagian</label>
                                            <select name="kd_bagian" id="kd_bagian" class="form-control input-default" required>
                                                <option disabled selected></option>
                                                @foreach ($bagian as $result => $bag)
                                                <option value="{{$bag->kd_bagian}}" {{$bag->kd_bagian == $editrkap->kd_bagian ? 'selected' : ''}}>{{$bag->bagian}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 style1">
                                            <label for="kd_seksi">Seksi</label>
                                            <select name="kd_seksi" id="kd_seksi" class="form-control input-default" required>
                                                @foreach ($seksi as $result => $item)
                                                <option value="{{$item->kd_seksi}}" {{$item->kd_seksi == $editrkap->kd_seksi ? 'selected' : ''}}>{{$item->seksi}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>                                 
                                    <div class="form-row">
                                        <div class="form-group col-md-6 style1">
                                            <label for="kd_bagian">Cost Center</label>
                                            <input type="text" name="cost_center" id="" class="form-control input-default" placeholder="Cost Center" required required value="{{ $editrkap->getRkap->cost_center }}">
                                        </div>
                                        <div class="form-group col-md-6 style1">
                                            <label for="kd_seksi">Account</label>
                                            <input type="text" name="gl_acc" id="" class="form-control input-default" placeholder="Account" required required value="{{ $editrkap->getRkap->gl_acc }}">
                                        </div>
                                    </div>                                   
                                    <div class="general-button">
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='/transport/rkap-detail-tampil'">Back</button>
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
            $("#kd_rkap").select2({
                placeholder: 'Pilih Kode Rkap',
                allowClear : true
            });
            $("#kd_bagian").select2({
                placeholder: 'Pilih Bagian',
                allowClear: true
            }); // fungsi untuk mengubah dropdown biasa menjadi plugin select2
            $("#kd_seksi").select2({
                placeholder: 'Pilih Seksi',
                allowClear: true,
            });

            $("#kd_bagian").change(function () {
            var seksi = "<option disabled selected></option>"
            $("#kd_seksi")
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
        </script>
        
    @endsection