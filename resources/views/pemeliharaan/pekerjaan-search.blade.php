@extends('layouts.master')
@section('title','Data Pekerjaan')
@section('content')
<div class="container-fluid mt-3">
    @if (session('message-success'))
        <div class="alert alert-success">{{session('message-success')}}</div>
    @elseif (session('approve'))
        <div class="alert alert-success">{{session('approve')}}</div>
    @elseif (session('done'))
        <div class="alert alert-success">{{session('done')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Pekerjaan</h4>
                    <button type="button" class="btn btn-primary mb-3" onclick="window.location.href='/pemeliharaan/pekerjaan-create'">Tambah Pekerjaan</button>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <td>No Booking</td>
                                        <td>Nama</td>
                                        <td>NIK</td>
                                        <td>Tanggal</td>
                                        <td>Klasifikasi</td>
                                        <td>Status</td>
                                        <td>Detail</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pekerjaan as $result => $item)    
                                    <tr>
                                        <td>{{$item->booknumber}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->nik}}</td>
                                        <td>{{$item->tanggal_pekerjaan}}</td>
                                        <td>{{$item->getKlasifikasi->klasifikasi_pekerjaan}}</td>
                                        <td>{{$item->status}}</td>
                                        <td><button class="btn btn-primary" data-toggle="modal" 
                                            data-target="detail" onclick="detailValue({!! $item !!})">
                                            Detail    
                                        </button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- modal detail  --}}
                        <div class="bootstrap-modal">
                            <div class="modal fade" id="detail" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail Pekerjaan</h5>
                                            <button class="close" type="button" data-dismiss="modal">
                                                <span>x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                           <div class="table-responsive">
                                               <table class="table table-striped table-bordered">
                                                    <tr>
                                                        <th>Book Number</th>
                                                        <td id="">{{$pekerjaan->booknumber}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nama / Nik</th>
                                                        <td>{{$pekerjaan->nama}} / {{$pekerjaan->nik}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Telepon</th>
                                                        <td>{{$pekerjaan->telepon}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th rowspan="3">Area</th>
                                                        <td>{{$pekerjaan->kd_area}}
                                                            - {{$pekerjaan->getAreaKlasifikasi->klasifikasi_area}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$pekerjaan->kd_alamat}} - {{$pekerjaan->getAreaAlamat->alamat}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$pekerjaan->kd_keterangan}}
                                                            - {{$pekerjaan->getAreaKeterangan->keterangan}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Klasifikasi Pekerjaan</th>
                                                        <td>{{$pekerjaan->kd_klasifikasi_pekerjaan}}
                                                            - {{$pekerjaan->getKlasifikasi->klasifikasi_pekerjaan}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tanggal</th>
                                                        <td>{{$pekerjaan->tanggal_pekerjaan}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status</th>
                                                        <td>{!! $pekerjaan->notification_badge !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Uraian</th>
                                                        <td>{{$pekerjaan->uraian}}</td>
                                                    </tr>
                                               </table>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        function detailValue(data) {
            $('#booknumber').val(data.booknumber)
        }
    </script>
@endsection
