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
                            <h4 class="card-title">Edit Seksi</h4>
                        </div>
                        {{-- <div class="col-md-6 text-right">
                            <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/organisasi-departemen-create'">+ Tambah Departemen</button>
                        </div> --}}
                    </div>
                    <div class="card-content">
                        <form name="seksi" action="/organisasi-seksi-update/{{$seksi->kd_seksi}}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="seksi">Seksi</label>
                                <input type="text" name="seksi" id="" class="form-control input-default" value="{{$seksi->seksi}}" required>
                            </div>
                            <div class="basic-form">
                                <button type="button" class="btn btn-primary" onclick="window.location.href='/organisasi-seksi/{{$seksi->kd_bagian}}'">Back</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection