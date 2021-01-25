@extends('layouts.master')
@section('title','Detail Pekerjaan')
@section('content')
<div class="container-fluid mt-3">
    {{-- notification area  --}}
    @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @elseif (session('disapprove'))
        <div class="alert alert-success">{{session('dissapprove')}}</div>
    @elseif (session('revisi'))
        <div class="alert alert-success">{{session('revisi')}}</div>
    {{-- @elseif ($pekerjaan->status == 'Canceled')
        <div class="alert alert-danger">Permohonan pekerjaan telah dibatalkan.</div> --}}
    @elseif (session('update'))
        <div class="alert alert-success">{{session('update')}}</div>
    @endif
    {{-- end notification area  --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail Pekerjaan</h4>
                    <div class="card-content">
                        {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Book Number</th>
                                    <td>{{$pekerjaan->booknumber}}</td>
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
                                    <td>{{$pekerjaan->kd_area}} - {{$pekerjaan->getAreaKlasifikasi->klasifikasi_area}}</td>
                                </tr>
                                <tr>
                                    <td>{{$pekerjaan->kd_alamat}} - {{$pekerjaan->getAreaAlamat->alamat}}</td>
                                </tr>
                                <tr>
                                    <td>{{$pekerjaan->kd_keterangan}} - {{$pekerjaan->getAreaKeterangan->keterangan}}</td>
                                </tr>
                                <tr>
                                    <th>Klasifikasi Pekerjaan</th>
                                    <td>{{$pekerjaan->kd_klasifikasi_pekerjaan}} - {{$pekerjaan->getKlasifikasi->klasifikasi_pekerjaan}}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>{{$pekerjaan->tanggal_pekerjaan}}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <a href="" class="badge {{$warna}}">{{$pekerjaan->status}}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Uraian</th>
                                    <td>{{$pekerjaan->uraian}}</td>
                                </tr>
                                @if ($pekerjaan->getFile->count() != null) {{-- Kondisi untuk Cek apakah ada data ber-relasi atau tidak --}}
                                <tr>
                                    <th rowspan="{{$pekerjaan->getFile->count() + 1}}">Foto</th>
                                    @foreach ($pekerjaan->getFile->all() as $foto)
                                    <tr>
                                        <td>
                                            <img src="{{asset('pemeliharaan/'.$foto->file)}}" width="150px"><br>
                                            <a href="{{asset('pemeliharaan/'.$foto->file)}}">{{$foto->file}}</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tr>
                                @else {{-- Jika tidak ada data ber-relasi, munculkan kode berikut --}}
                                <tr>
                                    <th>Foto</th>
                                    <td>Tidak ada foto yang diupload</td>
                                </tr>
                                @endif
    
                            </table>
                        </div>
                        <div class="general-button">
                            <button class="btn btn-primary" type="button" onclick="window.location.href='/pemeliharaan/pekerjaan'">Back</button>
                            @if ($pekerjaan->status == 'Requested' || $pekerjaan->status == 'Revisi')
                                <button class="btn btn-primary" type="button" onclick="window.location.href='/pemeliharaan/pekerjaan-edit/{{$pekerjaan->booknumber}}'">Edit</button>
                                @if (Auth::user()->role == 'Admin')
                                <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modalRevisi">Revisi</button>
                                <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modalApprove">Approve</button>
                                @endif
                            @endif
                            @if ($pekerjaan->status == 'Approved')
                                @if (Auth::user()->role == 'Worker')    
                                <button class="btn btn-primary" onclick="window.location.href='/pemeliharaan/pekerjaan-proceed/{{$pekerjaan->booknumber}}'">Proceed</button>
                                @elseif(Auth::user()->role == 'Admin')
                                <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modalDisapprove">Disapprove</button>
                                @endif
                            @endif
                            @if ($pekerjaan->status == 'In Progress' && Auth::user()->role == 'Worker')    
                                <button class="btn btn-primary" onclick="window.location.href='/pemeliharaan/pekerjaan-done/{{$pekerjaan->booknumber}}'">Done</button>
                            @endif
                            @if ($pekerjaan->status == 'Done')
                                @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'User')
                                <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modalClosed">Close</button>
                                @endif
                            @endif
                            @if ($pekerjaan->status == 'Requested' || $pekerjaan->status == 'Approved')
                                @if (Auth::user()->role == 'Admin')
                                <button class="btn btn-danger" type="button" onclick="window.location.href='/pemeliharaan/pekerjaan-cancel/{{$pekerjaan->booknumber}}'">Cancel</button>
                                @endif
                            @endif
                        </div>
                        {{-- modal approve  --}}
                        <div class="bootstrap-modal">
                            <div class="modal fade" id="modalApprove" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Approval Pekerjaan</h5>
                                            <button class="close" type="button" data-dismiss="modal">
                                                <span>x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/pemeliharaan/pekerjaan-approve/{{$pekerjaan->booknumber}}" 
                                                method="post" name="approve" enctype="multipart/form-data">
                                                @csrf
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <label for="tanggal_pelaksanaan">Tanggal Pengerjaan</label>
                                                        <input type="date" name="tanggal_pelaksanaan" id="" class="form-control input-default" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="approve" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end modal approve  --}}

                        {{-- modal disapprove  --}}
                        <div class="bootstrap-modal">
                            <div class="modal fade" id="modalDisapprove" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Disapprove Pekerjaan</h5>
                                            <button class="close" type="button" data-dismiss="modal">
                                                <span>x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/pemeliharaan/pekerjaan-disapprove/{{$pekerjaan->booknumber}}" 
                                                method="post" name="disapprove" enctype="multipart/form-data">
                                                @csrf
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <label for="tanggal_pelaksanaan">Catatan</label>
                                                        <textarea name="catatan" id="" cols="30" rows="10" class="form-control input-default"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="disapprove" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end modal disapprove  --}}

                        {{-- modal close  --}}
                        <div class="bootstrap-modal">
                            <div class="modal fade" id="modalClosed" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Close Pekerjaan</h5>
                                            <button class="close" type="button" data-dismiss="modal">
                                                <span>x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/pemeliharaan/pekerjaan-close/{{$pekerjaan->booknumber}}" 
                                                method="post" name="closed" enctype="multipart/form-data">
                                                @csrf
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <label for="tanggal_pelaksanaan">Nilai Pelayanan</label>
                                                        <select name="nilai" id="" class="form-control input-default" required>
                                                            <option selected>Pilih Nilai</option>
                                                            <option value="5">5 - Sangat Memuaskan</option>
                                                            <option value="4">4 - Memuaskan</option>
                                                            <option value="3">3 - Cukup</option>
                                                            <option value="2">2 - Kurang</option>
                                                            <option value="1">1 - Tidak Memuaskan</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tanggal_pelaksanaan">Kritik & Saran</label>
                                                        <textarea name="catatan" id="" cols="30" rows="10" class="form-control input-default"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="closed" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end modal close  --}}

                        {{-- modal revisi  --}}
                        <div class="bootstrap-modal">
                            <div class="modal fade" id="modalRevisi" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Revisi Pekerjaan</h5>
                                            <button class="close" type="button" data-dismiss="modal">
                                                <span>x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/pemeliharaan/pekerjaan-revisi/{{$pekerjaan->booknumber}}" 
                                                method="post" name="revisi" enctype="multipart/form-data">
                                                @csrf
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <label for="tanggal_pelaksanaan">Catatan</label>
                                                        <textarea name="catatan" id="" cols="30" rows="10" class="form-control input-default"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="revisi" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end modal revisi  --}}

                        {{-- modalEnd  --}}
                        <div class="bootstrap-modal">
                            <div class="modal fade" id="modalEnd" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Message</h5>
                                        </div>
                                        <div class="modal-body">
                                            <h3 class="text-center">{{session('close')}}</h3>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-dismiss="modal" 
                                            onclick="window.location.href='/pemeliharaan/pekerjaan'">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end modalEnd  --}}
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Catatan</h4>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Catatan</th>
                                </tr>
                                @if ($pekerjaan->getPekerjaanVerifikasi->count() != null)
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($pekerjaan->getPekerjaanVerifikasi as $result => $notes)  
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$notes->tgl}}</td>
                                    <td>{{$notes->status}}</td>
                                    <td>{{$notes->catatan}}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4" align="center">Tidak ada catatan.</td>
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Waiting List</h4>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>No Booking</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Tanggal</th>
                                    <th>Klasifikasi</th>
                                    <th>Status</th>
                                </tr>
                                @if ($waitinglist->count() != null)
                                @php
                                    $no =1;
                                @endphp
                                @foreach ($waitinglist as $key => $list)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$list->booknumber}}</td>
                                    <td>{{$list->nama}}</td>
                                    <td>{{$list->nik}}</td>
                                    <td>{{$list->tanggal_pekerjaan}}</td>
                                    <td>{{$list->kd_klasifikasi_pekerjaan}} - {{$list->getKlasifikasi->klasifikasi_pekerjaan}}</td>
                                    <td>
                                        @if ($list->status == 'Requested')
                                        <a href="" class="badge badge-primary">{{$list->status}}</a>
                                        @elseif ($list->status == 'Approved' || $list->status == 'In Progress' || $list->status == 'Closed')
                                        <a href="" class="badge badge-success">{{$list->status}}</a>
                                        @elseif ($list->status == 'Done' || $list->status == 'Revisi')
                                        <a href="" class="badge badge-warning">{{$list->status}}</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4" align="center">Tidak ada waiting list.</td>
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    @if (session('close'))
        <script>
            $(document).ready(function() {
                $('#modalClose').modal();
            });
        </script>
    @endif
@endsection