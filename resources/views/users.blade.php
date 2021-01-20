@extends('layouts.master')
@section('title','User')
@section('content')
<div class="container-fluid mt-3">
    @if (session('message-success'))
        <div class="alert alert-success">{{session('message-success')}}</div>
    @elseif (session('message-error'))
        <div class="alert alert-danger">{{session('message-error')}}</div>
    @elseif (session('message-success-delete'))
        <div class="alert alert-danger">{{session('message-success-delete')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data User</h4>
                    <div class="general-button">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah User</button>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#import">Upload User (Excel)</button>
                    </div>
                    <div class="card-content">
                        <div class="form-group">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm table-bordered zero-configuration" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Level</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($user as $item => $users)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$users->nama}}</td>
                                            <td>{{$users->role}}</td>
                                            <td>{{$users->level}}</td>
                                            <td><a href="" class="badge badge-success">Detail</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- tambah user  --}}
                    <div class="bootstrap-modal">
                        <div class="modal fade" id="tambah" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah User</h5>
                                        <button class="close" type="button" data-dismiss="modal">
                                            <span>x</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/users-store"
                                              method="post" name="tambah" enctype="multipart/form-data">
                                            @csrf
                                            <div class="basic-form">
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" name="nama" id=""
                                                        class="form-control input-default" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nik">NIK</label>
                                                    <input type="text" name="nik" id=""
                                                        class="form-control input-default" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" id=""
                                                        class="form-control input-default" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="bagian">Bagian</label>
                                                    <select name="kd_bagian" id="kd_bagian" class="form-control input-default" required>
                                                        <option disabled selected></option>
                                                        @foreach ($bagian as $itemBagian)
                                                            <option value="{{$itemBagian->kd_bagian}}">{{$itemBagian->bagian}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="seksi">Seksi</label>
                                                    <select name="kd_seksi" id="kd_seksi" class="form-control input-default" disabled required></select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="regu">Regu</label>
                                                    <select name="kd_regu" id="kd_regu" class="form-control input-default" required></select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Role</label>
                                                    <select name="role" id="role" class="form-control input-default" required>
                                                        <option disabled selected></option>
                                                        @if (Auth::user()->role == 'Root')
                                                        <option value="Admin">Admin</option>
                                                        @endif
                                                        <option value="Worker">Worker</option>
                                                        <option value="User">User</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="level">Level Group</label>
                                                    <select name="level" id="level" class="form-control input-default" required>
                                                        <option disabled selected></option>
                                                        @if (Auth::user()->role == 'Root')
                                                        <option value="0">Root</option>
                                                        @endif
                                                        <option value="1">Karyawan</option>
                                                        <option value="2">Unit Kerja</option>
                                                        <option value="3">Rumdin</option>
                                                    </select>
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
                    {{-- tambah user excel  --}}
                    <div class="bootstrap-modal">
                        <div class="modal fade" id="import" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah User</h5>
                                        <button class="close" type="button" data-dismiss="modal">
                                            <span>x</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/users-import"
                                              method="post" name="import" enctype="multipart/form-data">
                                            @csrf
                                            <div class="basic-form">
                                                <div class="form-group">
                                                    <label for="file">Browse</label>
                                                    <input type="file" name="user" id="" class="form-control input-default" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-dismiss="modal">Close
                                                </button>
                                                <button type="submit" name="import" class="btn btn-primary">Upload
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
        $("#role").select2({
            width: '100%',
            placeholder: 'Pilih Role',
            allowClear: true
        });
        $("#level").select2({
            width: '100%',
            placeholder: 'Pilih Level Group',
            allowClear: true
        });
        $("#kd_bagian").select2({
            width: '100%',
            placeholder: 'Pilih Bagian',
            allowClear: true
        }); // fungsi untuk mengubah dropdown biasa menjadi plugin select2
        $("#kd_seksi").select2({
            width: '100%',
            placeholder: 'Pilih Seksi',
            allowClear: true,
            disabled: true
        }); // fungsi untuk mengubah dropdown biasa menjadi plugin select2
        $("#kd_regu").select2({
            width: '100%',
            placeholder: 'Pilih Regu',
            allowClear: true,
            disabled: true
        }); // fungsi untuk mengubah dropdown biasa menjadi plugin select2


        $("#kd_bagian").change(function () {
            var seksi = "<option disabled selected></option>"
            $("#kd_seksi")
                .empty()
                .prop("disabled", true);
            $("#kd_regu")
                .empty()
                .prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "/api/get-bagian", // memanggil url di controller API/Controller/GetResponse@getAlamat & akan output data JSON
                data: {
                    kd_bagian: $("#kd_bagian").val()
                },
                error: function(e) {
                    console.log(e)
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    for (var x = 0; data.length > x; x++) {
                        seksi += "<option value="+data[x].kd_seksi + ">" + data[x].seksi + "</option>"; // data json yang telah dioutput diassign ke variable dalam bentuk tag <option>
                    }
                    console.log(seksi); // ini hanya untuk cek di console browser, apakah data berhasil teroutput?
                    $("#kd_seksi")
                    .empty()
                    .append(seksi) // variable yang berisi tag <option> diassign ke combobox terkait
                    .prop("disabled", false);
                }
            })
        })

        $("#kd_seksi").change(function () {
            var regu = "<option disabled selected></option>"
            $.ajax({
                type: "POST",
                url: "/api/get-seksi", // memanggil url di controller API/Controller/GetResponse@getAlamat & akan output data JSON
                data: {
                    kd_seksi: $("#kd_seksi").val()
                },
                error: function(e) {
                    console.log(e)
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    for (var x = 0; data.length > x; x++) {
                        regu += "<option value="+data[x].kd_regu + ">" + data[x].regu + "</option>"; // data json yang telah dioutput diassign ke variable dalam bentuk tag <option>
                    }
                    console.log(regu); // ini hanya untuk cek di console browser, apakah data berhasil teroutput?
                    $("#kd_regu")
                    .empty()
                    .append(regu) // variable yang berisi tag <option> diassign ke combobox terkait
                    .prop("disabled", false);
                }
            })
        })
    </script>
@endsection
