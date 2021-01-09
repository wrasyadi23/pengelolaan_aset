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
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah">+ Tambah Klasifikasi</button>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-stripped table-bordered zero-configuration">
                               <thead>
                                   <tr>
                                       <td>No.</td>
                                       <td>Kode</td>
                                       <td>Klasifikasi Area</td>
                                       <td>Action</td>
                                   </tr>
                               </thead>
                               <tbody>
                                   @php
                                       no = 1;
                                   @endphp
                                   @foreach ($klasifikasi as $item)    
                                   <tr>
                                       <td>{{$no++}}</td>
                                       <td>{{$item->kd_area}}</td>
                                       <td>{{$item->klasifikasi_area}}</td>
                                       <td>
                                           <button class="btn-btn-warning btn-sm" type="button" data-toggle="modal" data-target="#edit">Edit</button>
                                           <button class="btn-btn-danger btn-sm" type="button" 
                                           onclick="window.location.href='/pemeliharaan/area-klasifikasi-delete/{{$item->kd_area}}'">Delete</button>
                                       </td>
                                   </tr>
                                   @endforeach
                               </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- modal tambah --}}
                    <div class="bootstrap-modal">
                        <div class="modal fade" id="tambah" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Klasifikasi</h5>
                                        <button class="close" type="button" data-dismiss="modal">
                                            <span>x</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/pemeliharaan/area-klasifikasi-store" 
                                            method="post" name="tambah" enctype="multipart/form-data">
                                            @csrf
                                            <div class="basic-form">
                                                <div class="form-group">
                                                    <label for="tanggal_pelaksanaan">Klasifikasi Area</label>
                                                    <input type="text" name="klasifikasi_area" id="" class="form-control input-default" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="tambah" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="bootstrap-modal">
                        <div class="modal fade" id="edit" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Klasifikasi</h5>
                                        <button class="close" type="button" data-dismiss="modal">
                                            <span>x</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/pemeliharaan/area-klasifikasi-update/{{$klasifikasi->first()->kd_area}}" 
                                            method="post" name="edit" enctype="multipart/form-data">
                                            @csrf
                                            <div class="basic-form">
                                                <div class="form-group">
                                                    <label for="tanggal_pelaksanaan">Klasifikasi Area</label>
                                                    <input type="text" name="klasifikasi_area" id="" 
                                                        class="form-control input-default" required value="{{$klasifikasi->first()}}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="edit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
