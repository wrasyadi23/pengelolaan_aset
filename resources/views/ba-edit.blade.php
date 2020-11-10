@extends('layouts.master')
@section('title','Kontrak/SP')
@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit BA Kontrak</h4>
                    <div class="card-content">
                        <form action="/ba-update/{{$kontrakBA->kd_ba}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="Kontrak">No. Kontrak</label>
                                <select name="kd_sp" id="kd_sp" class="form-control input-default">
                                    @foreach ($kontrak as $result => $sp)
                                        <option value="{{$sp->kd_sp}}" {{$sp->kd_sp == $kontrakBA->kd_sp ? 'selected' : ''}}>{{$sp->no_sp}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" name="tgl" id="" value="{{$kontrakBA->tgl}}" class="form-control input-default" required>
                            </div>
                            <div class="form-group">
                                <label for="periode">Periode</label>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="date" name="tgl_awal" id="" value="{{$kontrakBA->tgl_awal}}" class="form-control input-default" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="date" name="tgl_akhir" id="" value="{{$kontrakBA->tgl_akhir}}" class="form-control input-default" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="file">File BA Kontrak/Dokumen terkait</label>
                                <input type="file" name="dokumen[]" id="dokumen[]" class="form-control input-default" multiple>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>File</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($kontrakBA->getKontrakBAFile != null)
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($kontrakBA->getKontrakBAFile->all() as $file)    
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td><a href="{{asset('kontrak/' . $file->file)}}">{{$file->file}}</a></td>
                                                    <td><a href="/ba-delete-file/{{$file->id}}" class="badge badge-danger">Hapus</a></td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                               <td colspan="3">Tidak ada file yang diunggah.</td> 
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="general-button">
                                <button class="btn btn-primary" onclick="window.location.href='/ba'">Back</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
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
@section('script')
    <script>
        $("#kd_sp").select2({
            placeholder: 'Pilih Kontrak/SP',
            allowClear: true
        });
    </script>
@endsection
