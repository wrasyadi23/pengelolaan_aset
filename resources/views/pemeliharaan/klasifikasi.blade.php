@extends('layouts.master')
@section('title','Klasifikasi')
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
                            <h4 class="card-title">Input Klasifikasi Pekerjaan</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/pemeliharaan/klasifikasi-create'">+ Tambah Klasifikasi</button>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="alert alert-success">Ini adalah menu klasifikasi pekerjaan.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection