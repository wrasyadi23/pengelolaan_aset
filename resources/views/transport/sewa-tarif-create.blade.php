@extends('layouts.master')
@section('title','Input Harga Sewa Esidentil')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Harga Sewa Esidentil</h4>
                    <div class="card-content">
                        <form action="/transport/sewa-tarif-store" method="post">
                            @csrf
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for="kd_ba">Kode BA</label>
                                    <select name="kd_ba" id="kd_ba" class="form-control input-default">
                                        <option disabled selected></option>
                                        @foreach ($rawDataBA as $item)
                                            <option value="{{$item->kd_ba}}">{{$item->no_ba}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="klasifiksai_tarif">Klasifikasi Tarif</label>
                                        <input type="text" name="klasifiksai_tarif" id="" class="form-control input-default" placeholder="Klasifikasi Tarif" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="merk">Merk Kendaraan</label>
                                        <input type="text" name="merk" id="" class="form-control input-default" placeholder="Merk Kendaraan" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="type">Type Kendaraan</label>
                                        <input type="text" name="type" id="" class="form-control input-default" placeholder="Type Kendaraan" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                            <label for="jenis">Jenis Kendaraan</label>
                                            <select name ="jenis_kend" class="form-control input-default">
                                                <option selected="selected">Pilih Jenis Kendaraan</option>
                                                <option value="Sedan">Sedan</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Station">Station</option>
                                                <option value="PickUp">PickUp</option>
                                                <option value="Spdmtr">Sepeda Motor</option>
                                                <option value="Spdmtrroda3">Sepeda Motor Roda 3</option>
                                            </select>
                                    </div>                                
                                    <div class="form-group col-md-12">
                                        <label for="tahun">Harga Sewa</label>
                                        <input type="text" name="harga" id="" class="form-control input-default" placeholder="Harga Sewa per hari" required>
                                    </div>
                                </div>
                                <div class="general-button">
                                    <button type="button" class="btn btn-primary" onclick="window.location.href='/transport/sewa-esd-tampil'">Back</button>
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