@extends('layouts.master')
@section('title','Input Service Request ESD')
@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Input Nopol ESD</h4>
                        <div class="card-content">
                            <form action="/transport/sr-esd-store-nopol/{{$kd_sr}}/{{$kd_tarif}}" method="post">
                                @csrf
                                <div class="basic-form">
                                    <div class="form-group">
                                        <label for="nopol">Nomor Polisi</label>
                                        <input type="text" name="nopol" id="" class="form-control input-default" placeholder="Nopol Kendaraan Yang Disewa"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <input type="text" name="tahun" id="" class="form-control input-default" placeholder="Tahun Kendaraan"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="warna">Dipergunakan</label>
                                        <input type="text" name="warna" id="" class="form-control input-default" placeholder="Dipergunakan Untuk"
                                               required>
                                    </div>
                                    <div class="general-button">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Nopol SR Isidentil</h4>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table-striped table-bordered zero-configuration table"
                                       style="width: 100%">
                                    <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nopol</td>
                                        <td>Merk</td>
                                        <td>Type</td>
                                        <td>Harga</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($getKendaraan as $index => $kendaraanPivot)
                                        <tr>
                                            <td>{{$index +1}}</td>
                                            <td>{{$kendaraanPivot->getKendaraan->nopol}}</td>
                                            <td>{{$kendaraanPivot->getKendaraan->merk}}</td>
                                            <td>{{$kendaraanPivot->getKendaraan->type}}</td>
                                            <td>{{$kendaraanPivot->getTarif->harga}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" align="center">Belum ada data kendaraan</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
