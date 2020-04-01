@extends('layouts.master')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Pekerjaan</h4>
                    <div class="card-content">
                        <button type="button" class="btn mb-1 btn-primary" onclick="window.location.href='/pemeliharaan/pekerjaan-create'">Tambah</button>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <td>No Booking</td>
                                        <td>Nama</td>
                                        <td>NIK</td>
                                        <td>Tanggal</td>
                                        <td>Keterangan</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="http://">202001010001</a></td>
                                        <td>Muhammad Wava</td>
                                        <td>2115446</td>
                                        <td>01 Januari 2020</td>
                                        <td>AC Transport Rusak</td>
                                        <td><span class="badge badge-pill badge-primary">Requested</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="http://">202001010002</a></td>
                                        <td>Gunawan</td>
                                        <td>2833626</td>
                                        <td>01 Januari 2020</td>
                                        <td>AC Musholla Rusak</td>
                                        <td><span class="badge badge-pill badge-primary">Requested</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="http://">202001010003</a></td>
                                        <td>Khosi'in</td>
                                        <td>2854451</td>
                                        <td>01 Januari 2020</td>
                                        <td>Kunci pintu ops rusak</td>
                                        <td><span class="badge badge-pill badge-primary">Requested</span></td>
                                    </tr>
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