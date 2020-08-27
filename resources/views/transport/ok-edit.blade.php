<style type="text/css">
    .style1 {color: #0066FF}
    </style>
    @extends('layouts.master')
    @section('title','Edit Order Kerja')
    @section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Order Kerja</h4>
                        <div class="card-content">
                            <form action="/transport/ok-update/{{ $editok->id}}" method="post">
                                @csrf
                                <div class="basic-form">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 style1">
                                            <label for="nopol">No OK</label>
                                            <input type="text" name="no_ok" id="" class="form-control input-default" placeholder="Isi No. PR" required value="{{ $editok->no_ok }}">
                                        </div>
                                        <div class="form-group col-md-12 style1">
                                            <label for="nopol">Tanggal OK</label>
                                            <input type="date" name="tgl" id="" class="form-control input-default" placeholder="Tanggal Sr" required  value="{{ $editok->tgl }}">
                                        </div>
                                    </div>
                                    
                                    <div class="general-button">
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='/transport/ok-tampil'">Back</button>
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

    