@extends('layouts.master')
@section('title','Home')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Requested Jobs</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{$pekerjaan->where('status','Requested')->count()}}</h2>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-database"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Approved Jobs</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{$pekerjaan->where('status','Approved')->count()}}</h2>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-database"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">Closed Jobs</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{$pekerjaan->where('status','Closed')->count()}}</h2>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-database"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Selamat Datang</h4>
                    <div class="card-content">
                        <div class="alert alert-success">Ini adalah menu dashboard pemeliharaan.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection