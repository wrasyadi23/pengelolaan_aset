@extends('layouts.master')
@section('title','Parkir & Tol')
@section('content')
<div class="container-fluid mt-3">
    @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <form action="/parkirtol-store" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-6">
                                <h4 class="card-title">Parkir & Tol</h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for="uangmuka">No. Uangmuka</label>
                                    <select name="kd_uangmuka" id="kd_uangmuka" class="form-control input-default" required>
                                        <option disabled selected></option>
                                        @foreach ($uangmuka as $item)
                                            <option value="{{$item->kd_uangmuka}}">{{$item->no_uangmuka}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <select name="kd_pengemudi" id="kd_pengemudi" class="form-control input-default" required>
                                        <option disabled selected></option>
                                        @foreach ($pengemudi as $item)
                                            <option value="{{$item->kd_pengemudi}}">{{$item->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tgl">Tanggal</label>
                                    <input type="date" name="tgl" id="" class="form-control input-default" required>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="trip_start">Trip Start</label>
                                        <input type="date" name="trip_start" id="" class="form-control input-default" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="trip_end">Trip End</label>
                                        <input type="date" name="trip_end" id="" class="form-control input-default" required>
                                    </div>
                                </div>            
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-6">
                                <h4 class="card-title">Detail Parkir & Tol</h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="basic-form">
                                detail parkirtol
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $("#kd_uangmuka").select2({
            placeholder: 'Pilih Uang Muka',
            allowClear: true
        });
        $("#kd_pengemudi").select2({
            placeholder: 'Pilih Pengemudi',
            allowClear: true
        });

    </script>
    <script src=""></script>
@endsection