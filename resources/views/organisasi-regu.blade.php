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
                        <h4 class="card-title">Input Data Regu - Seksi {{$seksi->seksi}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="basic-form">
                            <form name="regu" action="/organisasi-regu-store/{{$seksi->kd_seksi}}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-sm-4">
                                        <input type="text" name="regu" id="" class="form-control input-default" placeholder="Contoh : Listrik Perumahan & Perkantoran">
                                    </div>
                                    <div class="form-group col-sm-8">
                                        <button type="button" class="btn btn-primary" style="padding: 11px 20px 11px 20px;" onclick="window.location.href='/organisasi-seksi/{{$seksi->kd_bagian}}'">Back</button>
                                        <button type="submit" class="btn btn-primary" style="padding: 11px 20px 11px 20px;">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Regu - Seksi {{$seksi->seksi}}</h4>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Regu</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no='1';
                                    @endphp
                                    @foreach ($seksi->getRegu as $item => $ru)    
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$ru->kd_regu}}</td>
                                        <td>{{$ru->regu}}</td>
                                        <td><a href="/organisasi-regu-edit/{{$ru->kd_regu}}" class="badge badge-success">Edit</a> 
                                            <a href="/organisasi-regu-delete/{{$ru->id}}" class="badge badge-danger">Delete</a>
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