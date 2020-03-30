@extends('layouts.master')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Pekerjaan</h4>
                    <div class="card-content">
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
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>202001010001</td>
                                        <td>Muhammad Wava</td>
                                        <td>2115446</td>
                                        <td>01 Januari 2020</td>
                                        <td>AC Transport Rusak</td>
                                        <td><span class="badge badge-pill badge-primary">Requested</span></td>
                                        <td><span class="badge badge-pill badge-success"><a href="#">Detail</a></span></td>
                                    </tr>
                                    <tr>
                                        <td>202001010002</td>
                                        <td>Gunawan</td>
                                        <td>2833626</td>
                                        <td>01 Januari 2020</td>
                                        <td>AC Musholla Rusak</td>
                                        <td><span class="badge badge-pill badge-primary">Requested</span></td>
                                        <td><span class="badge badge-pill badge-success"><a href="#">Detail</a></span></td>
                                    </tr>
                                    <tr>
                                        <td>202001010003</td>
                                        <td>Khosi'in</td>
                                        <td>2854451</td>
                                        <td>01 Januari 2020</td>
                                        <td>Kunci pintu ops rusak</td>
                                        <td><span class="badge badge-pill badge-primary">Requested</span></td>
                                        <td><span class="badge badge-pill badge-success"><a href="#">Detail</a></span></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>No Booking</td>
                                        <td>Nama</td>
                                        <td>NIK</td>
                                        <td>Tanggal</td>
                                        <td>Keterangan</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection