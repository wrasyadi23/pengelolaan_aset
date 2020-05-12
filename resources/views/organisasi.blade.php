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
                            <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/organisasi-create'">+ Tambah Departemen</button>
                        </div>
                    </div>
                    <div class="card-content">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection