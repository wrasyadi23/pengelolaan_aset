@extends('layouts.master')
@section('title','Input Service Request ESD')
@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Input Nopol ESD</h4>
                        <div class="card-content">
                            <form action="/transport/sr-esd-store-nopol" method="post">
                                @csrf
                                <div class="basic-form">
                                    <div class="form-group">
                                        <label for="nopol">Nomor Polisi</label>
                                        <input type="text" name="nopol" id="" class="form-control input-default" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <input type="text" name="tahun" id="" class="form-control input-default" required>
                                    </div>
                                    <div class="general-button">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection