@extends('layouts.master')
@section('title','Data Pekerjaan')
@section('content')
    <div class="container-fluid mt-3">
        @if (session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @elseif (session('delete'))
            <div class="alert alert-danger">{{session('delete')}}</div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Keterangan</h4>
                        <div class="general-button">
                            <button class="btn btn-primary" onclick="window.location.href='/pemeliharaan/area-alamat/{{$alamat->kd_area}}'">Back</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah Keterangan
                            </button>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Kode</td>
                                            <td>Keterangan</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($alamat->getAreaKeterangan as $item => $ket)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$ket->kd_keterangan}}</td>
                                            <td>{{$ket->keterangan}}</td>
                                            <td>
                                                <button class="btn btn-warning btn-sm triggerEditModal" type="button"
                                                        data-toggle="modal"
                                                        data-target="#edit" onclick='editValue({!! $ket !!})'>Edit
                                                </button>
                                                <button class="btn btn-danger btn-sm" type="button"
                                                        onclick="window.location.href='/pemeliharaan/area-keterangan-delete/{{$ket->kd_keterangan}}'">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- modal tambah --}}
                        <div class="bootstrap-modal">
                            <div class="modal fade" id="tambah" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Keterangan</h5>
                                            <button class="close" type="button" data-dismiss="modal">
                                                <span>x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/pemeliharaan/area-keterangan-store/{{$alamat->kd_alamat}}"
                                                  method="post" name="tambah" enctype="multipart/form-data">
                                                @csrf
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <label for="area_keterangan">Keterangan</label>
                                                        <input type="text" name="area_keterangan" id=""
                                                               class="form-control input-default" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" data-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit" name="tambah" class="btn btn-primary">Submit
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- modal edit --}}
                        <div class="bootstrap-modal">
                            <div class="modal fade" id="edit" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Alamat</h5>
                                            <button class="close" type="button" data-dismiss="modal">
                                                <span>x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form
                                                action="" {{-- Action diisi lewat fungsi JS editValue  --}}
                                            method="post" id="edit-form" enctype="multipart/form-data">
                                                @csrf
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <label for="area_keterangan">Keterangan</label>
                                                        <input type="text" name="area_keterangan" id="area_keterangan"
                                                               class="form-control input-default" required
                                                               value="{{$alamat->getAreaKeterangan->first()}}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" data-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit" name="edit" form="edit-form" class="btn btn-primary">Submit
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function editValue(data) {
            $('#area_keterangan').val(data.keterangan)
            $('#edit-form').attr('action', '/pemeliharaan/area-keterangan-update/' + data.kd_keterangan)
        }
    </script>
@endsection
