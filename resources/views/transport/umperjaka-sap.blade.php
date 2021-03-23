<style type="text/css">
.style1 {color: #0000FF}
</style>
@extends('layouts.master')
@section('title','Isi Uangmuka Sap')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Isi Uangmuka Sap</h4>
                    <div class="card-content">
                        <form action="/transport/umperjaka-simpan/{{ $sap->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="no_uangmuka"><span class="style1">Nomor Uangmuka Sap</span></label>
                                    <input type="text" name="no_uangmuka" id="" class="form-control input-default" required value="{{ $sap->no_uangmuka }}">
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="nilai_uangmuka"><span class="style1">Tanggal Uangmuka Sap</span></label>
                                    <input type="date" name="tgl" id="" class="form-control input-default" required value="{{ $sap->tgl }}">
                                </div>
                                <div class="general-button">
                                    <button type="button" class="btn btn-primary" onclick="window.location.href='/transport/umperjaka'">Back</button>
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
{{-- @section('script')
    <script>
        $("#kd_aktifitas_rkap").select2({
            placeholder: 'Pilih Commit Item/Gl. Account',
            allowClear: true
        });
        $("#nik").select2({
            placeholder: 'Pilih Requester',
            allowClear: true
        });
    </script>
@endsection --}}