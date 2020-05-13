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
                            <h4 class="card-title">Edit Departemen</h4>
                        </div>
                        {{-- <div class="col-md-6 text-right">
                            <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/organisasi-departemen-create'">+ Tambah Departemen</button>
                        </div> --}}
                    </div>
                    <div class="card-content">
                        <form name="departemen" action="/organisasi-departemen-update/{{$departemen->kd_departemen}}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="departemen">Departemen</label>
                                <input type="text" name="departemen" id="" class="form-control input-default" value="{{$departemen->departemen}}" required>
                            </div>
                            <div class="basic-form">
                                <button class="btn btn-primary" onclick="window.location.href='/organisasi-departemen'">Back</button>
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