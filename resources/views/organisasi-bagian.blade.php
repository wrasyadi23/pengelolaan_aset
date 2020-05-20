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
                        <h4 class="card-title">Input Data Bagian - Departemen {{$bagian->first()->getDepartemen->departemen}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="basic-form">
                            <form action="/organisasi-bagian-store/{{$bagian->first()->kd_departemen}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="bagian" id="" class="form-control form-control-sm input-default" placeholder="Nama Bagian">
                                    <h6 class="font-italic text-danger mt-1">Contoh : Pemeliharaan Kawasan</h6>
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Bagian - Departemen {{$bagian->first()->getDepartemen->departemen}}</h4>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Bagian</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no='1';
                                    @endphp
                                    @foreach ($bagian as $item => $bag)    
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$bag->kd_bagian}}</td>
                                        <td>{{$bag->bagian}}</td>
                                        <td><a href="/organisasi-seksi-/{{$bag->kd_bagian}}" class="badge badge-primary">Data Seksi</a> 
                                            <a href="/organisasi-bagian-edit/{{$bag->id}}/{{$bag->kd_departemen}}" class="badge badge-success">Edit</a> 
                                            <a href="/organisasi-bagian-delete/{{$bag->id}}/{{$bag->kd_departemen}}" class="badge badge-danger">Delete</a>
                                        </td>
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
@endsection