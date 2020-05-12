@extends('layouts.master')
@section('title','Organisasi')
@section('content')
<div class="container-fluid mt-3">
    @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-6">
                            <h4 class="card-title">Data Organisasi</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/organisasi-departemen-create'">+ Tambah Departemen</button>
                        </div>
                    </div>
                    <div class="card-content">
                        {{-- <div class="basic-form">
                            <form action="/organisasi-search-departemen" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row mb-3">
                                    <div class="col-md-3">
                                        <input type="text" name="cari" id="" class="" style="padding: 2px 5px 2px 5px;" placeholder="Search">
                                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div> --}}
                        <div class="form-group">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm table-bordered zero-configuration" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Departemen</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($departemen as $dep)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$dep->kd_departemen}}</td>
                                            <td>{{$dep->departemen}}</td>
                                            <td><a href="/organisasi-bagian/{{$dep->kd_departemen}}" class="badge badge-primary">Detail</a> <a href="/organisasi-delete-departemen/{{$dep->kd_departemen}}" class="badge badge-danger">Delete</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection