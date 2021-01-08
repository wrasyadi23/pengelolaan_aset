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
                        <button type="button" class="btn btn-primary" onclick="window.location.href='/users-create'">+ Tambah User</button>
                        <button type="button" class="btn btn-success" onclick="window.location.href='/users-create-upload'">Upload User (Excel)</button>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    
@endsection