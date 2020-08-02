<style type="text/css">
    .style1 {color: #0066FF}
    </style>
    @extends('layouts.master')
    @section('title','Input Kendaraan')
    @section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Input Kenadraan</h4>
                        <div class="card-content">
                            <form action="/transport/simpan" method="post">
                                @csrf
                                <div class="basic-form">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 style1">
                                            <label for="kd_ba">Kode BA</label>
                                            <select name="kd_ba" id="kd_ba" class="form-control input-default">
                                                <option disabled selected></option>
                                                @foreach ($rawDataBA as $item)
                                                    <option value="{{$item->kd_ba}}">{{$item->no_ba}}</option>
                                                @endforeach
                                            </select>
                                        </div>                                      
                                        <div class="form-group col-md-6 style1">
                                            <label for="nopol">Nopol</label>
                                            <input type="text" name="nopol" id="" class="form-control input-default" placeholder="Nopol" required>
                                        </div>
                                        <div class="form-group col-md-6 style1">
                                            <label for="merk">Merk Kendaraan</label>
                                            <input type="text" name="merk" id="" class="form-control input-default" placeholder="Merk Kendaraan" required>
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="type">Type Kendaraan</label>
                                            <input type="text" name="type" id="" class="form-control input-default" placeholder="Type Kendaraan" required>
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="tahun">Tahun Pembuatan</label>
                                            <input type="year" name="tahun" id="" class="form-control input-default" placeholder="Tahun Pembuatan" required>
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="warna">Warna</label>
                                            <input type="text" name="warna" id="" class="form-control input-default" placeholder="Warna" required>
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="jenis">Jenis Kendaraan</label>
                                            <select name = "jenis" class="form-control">
                                                <option selected="selected">Pilih Jenis Kendaraan</option>
                                                <option value="Sedan">Sedan</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Station">Station</option>
                                                <option value="Spdmtr">Sepeda Motor</option>
                                                <option value="Spdmtrroda3">Sepeda Motor Roda 3</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="jenis_bbm">Jenis BBM</label>
                                            <select name = "jenis_bbm" class="form-control">
                                                <option selected="selected">Pilih Jenis Kendaraan</option>
                                                <option value="PetraMax">PetraMax</option>
                                                <option value="Pertalite">Pertalite</option>
                                                <option value="PeraminaDex">PeraminaDex</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="jata_bbm">Jata BBM</label>
                                            <input type="decimal" name="jml_bbm" id="" class="form-control input-default" placeholder="Jata BBM" required>
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="no_bpkb">No BPKB</label>
                                            <input type="text" name="no_bpkb" id="" class="form-control input-default" placeholder="No BPKB" required>
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="no_stnk">No STNK</label>
                                            <input type="text" name="no_stnk" id="" class="form-control input-default" placeholder="No STNK" required>
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="no_mesin">No Mesin</label>
                                            <input type="text" name="no_mesin" id="" class="form-control input-default" placeholder="No Mesin" required>
                                        </div>
                                        <div class="form-group col-md-12 style1">
                                            <label for="no_rangka">No. Rangka</label>
                                            <input type="text" name="no_rangka" id="" class="form-control input-default" placeholder="No. Rangka" required>
                                        </div>
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
            $("#kd_ba").select2({
                placeholder: 'Pilih Nomor BA',
                allowClear : true
            });
        </script>
        
    @endsection