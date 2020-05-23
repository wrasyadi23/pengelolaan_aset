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
                        <h4 class="card-title">Input Data Seksi - Bagian {{$bagian->bagian}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="basic-form">
                            <form name="seksi" action="/organisasi-seksi-store/{{$bagian->kd_bagian}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="seksi" id="" class="form-control input-default" placeholder="Contoh : Listrik, Instrumen & Telkom">
                                </div>
                                <div class="basic-form">
                                    <button type="button" class="btn btn-primary" onclick="window.location.href='/organisasi-bagian/{{$bagian->kd_departemen}}'">Back</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Seksi - Bagian {{$bagian->bagian}}</h4>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Seksi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no='1';
                                    @endphp
                                    @foreach ($bagian->getSeksi as $item => $sie)    
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$sie->kd_seksi}}</td>
                                        <td>{{$sie->seksi}}</td>
                                        <td><a href="/organisasi-regu/{{$sie->kd_seksi}}" class="badge badge-primary">Data Regu</a> 
                                            <a href="/organisasi-seksi-edit/{{$sie->kd_seksi}}" class="badge badge-success">Edit</a> 
                                            <a href="/organisasi-seksi-delete/{{$sie->id}}" class="badge badge-danger">Delete</a>
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