@extends('layouts.master')
@section('title','Detail Pekerjaan')
@section('content')
<div class="container-fluid mt-3">
    @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @elseif (session('disapprove'))
        <div class="alert alert-success">{{session('dissapprove')}}</div>
    @endif
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
                            @if ($pekerjaan->status == 'Requested')
                                <button class="btn btn-primary" type="button" onclick="window.location.href='/pemeliharaan/pekerjaan-edit/{{$pekerjaan->booknumber}}'">Edit</button>
                                @if (Auth::user()->role == 'Admin')
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
                                <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modalClosed">Closed</button>
                                @endif
                            @endif
                            @if ($pekerjaan->whereIn('status',['Requested','Approved']) && Auth::user()->role == 'Admin')
                                <button class="btn btn-danger" type="button" onclick="window.location.href='/pemeliharaan/pekerjaan-cancel/{{$pekerjaan->booknumber}}'">Cancel</button>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    
@endsection