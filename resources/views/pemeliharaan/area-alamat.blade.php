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
                        <h4 class="card-title">Alamat</h4>
                        <div class="general-button">
                            <button class="btn btn-primary" onclick="window.location.href='/pemeliharaan/area-klasifikasi'">Back</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah Alamat
                            </button>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Kode</td>
                                            <td>Alamat</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($klasifikasi->getAreaAlamat as $item => $alamat)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$alamat->kd_alamat}}</td>
                                            <td>{{$alamat->alamat}}</td>
                                            <td>
                                                <button class="btn btn-success btn-sm" onclick="window.location.href='/pemeliharaan/area-keterangan/{{$alamat->kd_alamat}}">
                                                    Detail
                                                </button>
                                                <button class="btn btn-warning btn-sm triggerEditModal" type="button"
                                                        data-toggle="modal"
                                                        data-target="#edit" onclick='editValue({!! $alamat !!})'>Edit
                                                </button>
                                                <button class="btn btn-danger btn-sm" type="button"
                                                        onclick="window.location.href='/pemeliharaan/area-alamat-delete/{{$alamat->kd_alamat}}'">
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
                                            <h5 class="modal-title">Tambah Alamat</h5>
                                            <button class="close" type="button" data-dismiss="modal">
                                                <span>x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/pemeliharaan/area-alamat-store/{{$klasifikasi->kd_area}}"
                                                  method="post" name="tambah" enctype="multipart/form-data">
                                                @csrf
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <label for="tanggal_pelaksanaan">Klasifikasi Area</label>
                                                        <input type="text" name="area_alamat" id=""
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
                                                        <label for="area_alamat">Klasifikasi Area</label>
                                                        <input type="text" name="area_alamat" id="area_alamat"
                                                               class="form-control input-default" required
                                                               value="{{$klasifikasi->getAreaAlamat->first()}}">
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
            $('#area_alamat').val(data.alamat)
            $('#edit-form').attr('action', '/pemeliharaan/area-alamat-update/' + data.kd_alamat)
        }
    </script>
@endsection
