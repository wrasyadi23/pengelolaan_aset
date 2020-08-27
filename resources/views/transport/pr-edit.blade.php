<style type="text/css">
    .style1 {color: #0066FF}
    </style>
    @extends('layouts.master')
    @section('title','Edit Purchase Request')
    @section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Purchase Request</h4>
                        <div class="card-content">
                            <form action="/transport/pr-update/{{ $editpr->id}}" method="post">
                                @csrf
                                <div class="basic-form">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 style1">
                                            <label for="nopol">No PR</label>
                                            <input type="text" name="no_pr" id="" class="form-control input-default" placeholder="Isi No. PR" required value="{{ $editpr->no_pr }}">
                                        </div>
                                        <div class="form-group col-md-12 style1">
                                            <label for="nopol">Tanggal PR</label>
                                            <input type="date" name="tgl" id="" class="form-control input-default" placeholder="Tanggal PR" required  value="{{ $editpr->tgl }}">
                                        </div>
                                    </div>
                                    
                                    <div class="general-button">
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='/transport/pr-tampil'">Back</button>
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

    @section('script')
        <script>
            $("#kd_sr").select2({
                placeholder: 'Pilih Nomor SR',
                allowClear : true
            });
        </script>
        
    @endsection