@extends('layouts.master')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Pekerjaan</h4>
                    <div class="card-content">
                        <form action="/pemeliharaan/pekerjaan-create" method="post">
                            @csrf
                            <div class="basic-form">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="klasifikasi-area">Klasifikasi Area</label>
                                        <select name="" id="" class="form-control"></select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="alamat">Sub Area 1/Alamat</label>
                                        <select name="" id="" class="form-control"></select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="keterangan">Sub Area 2/Keterangan</label>
                                        <select name="" id="" class="form-control"></select>
                                    </div>
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