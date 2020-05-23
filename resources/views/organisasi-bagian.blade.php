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
                        {{--
                            * Jika ingin panggil dari variable bagian meskipun data kosong harus menggunakan Ternary Operator (Operator pengkondisian IF sederhana): 
                            * BEFORE: {{$bagian->first()->getDepartemen->departemen}}
                            * AFTER: {{!empty($bagian->first()->getDepartemen->departemen) ? $bagian->first()->getDepartemen->departemen : 'Data Kosong'}}
                            *
                            * Penggunaan Ternary Operator:
                            * {{ (kondisi) ? (value jika kondisi true) : (value jika kondisi false) }}
                        --}}
                        <h4 class="card-title">Input Data Bagian - Departemen {{$departemen->departemen}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="basic-form">
                            <form name="bagian" action="/organisasi-bagian-store/{{$departemen->kd_departemen}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="bagian" id="" class="form-control input-default" placeholder="Contoh : Pemeliharaan Kawasan">
                                </div>
                                <div class="basic-form">
                                    <button type="button" class="btn btn-primary" onclick="window.location.href='/organisasi-departemen'">Back</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Bagian - Departemen {{$departemen->departemen}}</h4>
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
                                    @foreach ($departemen->getBagian as $item => $bag)    
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$bag->kd_bagian}}</td>
                                        <td>{{$bag->bagian}}</td>
                                        <td><a href="/organisasi-seksi/{{$bag->kd_bagian}}" class="badge badge-primary">Data Seksi</a> 
                                            <a href="/organisasi-bagian-edit/{{$bag->kd_bagian}}" class="badge badge-success">Edit</a> 
                                            <a href="/organisasi-bagian-delete/{{$bag->id}}" class="badge badge-danger">Delete</a>
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