<style type="text/css">
    .style1 {color: #0066FF}
    </style>
    @extends('layouts.master')
    @section('title','Edit Service Request Esd')
    @section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Sevice Request Esd</h4>
                        <div class="card-content">
                            <form action="/transport/sr-esd-update/{{ $editsresd->kd_sr }}" method="post">
                                @csrf
                                <div class="basic-form">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 style1">
                                            <label for="nopol">Service Request</label>
                                            <input type="text" name="no_sr" id="" class="form-control input-default" placeholder="No. Sr " required value="{{ $editsresd->no_sr }}">
                                        </div>
                                        <div class="form-group col-md-12 style1">
                                            <label for="nopol">Tanggal Sr</label>
                                            <input type="date" name="tgl" id="" class="form-control input-default" placeholder="Tanggal Sr" required value="{{ $editsresd->tgl }}">
                                        </div>
                                        <div class="form-group col-md-12 style1">
                                            <label for="merk">Tanggal Awal</label>
                                            <input type="date" name="tgl_awal" id="" class="form-control input-default" placeholder="Tanggal Awal Sr" required value="{{ $editsresd->tgl_awal }}">
                                        </div>
                                        <div class="form-group col-md-12 style1">
                                            <label for="type">Tangal Akhir</label>
                                            <input type="date" name="tgl_akhir" id="" class="form-control input-default" placeholder="Tangal Akhir Sr " required value="{{ $editsresd->tgl_akhir }}">
                                        </div>
                                        <div class="form-group col-md-12 style1">
                                            <label for="kd_ba">Status</label>
                                            <input type="text" name="status" id="" class="form-control input-default" placeholder="Status Sr" required value="{{ $editsresd->status }}">
                                        </div>
                                    </div>
                                    
                                    <div class="general-button">
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='/transport/sr-esd-tampil'">Back</button>
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
            $("#kd_ba").select2({
                placeholder: 'Pilih Nomor BA',
                allowClear : true
            });
        </script>
        
    @endsection