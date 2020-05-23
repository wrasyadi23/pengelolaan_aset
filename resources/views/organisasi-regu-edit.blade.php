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
                        <h4 class="card-title">Edit Regu</h4>
                    </div>
                    <div class="card-content">
                        <form name="regu" action="/organisasi-regu-update/{{$regu->kd_regu}}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="regu">Regu</label>
                                <input type="text" name="regu" id="" class="form-control input-default" value="{{$regu->regu}}" required>
                            </div>
                            <div class="basic-form">
                                <button type="button" class="btn btn-primary" onclick="window.location.href='/organisasi-seksi/{{$regu->kd_seksi}}'">Back</button>
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