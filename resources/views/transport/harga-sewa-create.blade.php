@extends('layouts.master')
@section('title','Harga Sewa')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Harga Sewa Kendaraan</h4>
                    <div class="card-content">
                        <form action="/ba-store" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">No. BA Kontrak</label>
                                <select name="kd_ba" id="kd_ba" class="form-control input-default" required>
                                    @foreach ($kontrakba as $item)
                                        <option value="{{$item->kd_ba}}">{{$item->no_ba}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Klasifikasi Tarif</label>
                                <select name="klasifikasi_tarif" id="klasifikasi_tarif" class="form-control input-default" required>
                                    <option selected></option>
                                    <option value="Jabar I">Jabar I</option>
                                    <option value="Jabar II">Jabar II</option>
                                    <option value="Jateng I">Jateng I</option>
                                    <option value="Jateng II">Jateng II</option>
                                    <option value="Jatim I">Jatim I</option>
                                    <option value="Jatim II">Jatim II</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Merk</label>
                                <input type="text" name="merk" id="" class="form-control input-default" required>
                            </div>
                            <div class="form-group">
                                <label for="">Type</label>
                                <input type="text" name="type" id="" class="form-control input-default" required>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kendaraan</label>
                                <select name="jenis_kend" id="jenis_kend" class="form-control input-default" required>
                                    <option selected></option>
                                    <option value="Station">Station</option>
                                    <option value="Pick Up">Pick Up</option>
                                    <option value="Bus Besar">Bus Besar</option>
                                    <option value="Bus Medium">Bus Medium</option>
                                    <option value="Sepeda Motor">Sepeda Motor</option>
                                    <option value="Sepeda Gerobak">Sepeda Gerobak</option>
                                </select>
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" name="type" id="" class="form-control input-default">
                            </div>
                            <div class="general-button">
                                <button class="btn btn-primary" onclick="window.location.href='/transport/harga-sewa'">Back</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
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
        $("#kd_ba").select2({
            placeholder: 'Pilih No. BA Kontrak',
            allowClear: true
        });
        $("#klasifikasi_tarif").select2({
            placeholder: 'Pilih Klasifikasi Tarif',
            allowClear: true
        });
        // $("#merk").select2({
        //     placeholder: 'Pilih Merk',
        //     allowClear: true
        // });
        // $("#type").select2({
        //     placeholder: 'Pilih Type',
        //     allowClear: true
        // });
        $("#jenis_kend").select2({
            placeholder: 'Pilih Jenis Kendaraan',
            allowClear: true
        });
    </script>
@endsection
