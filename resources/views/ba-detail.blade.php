@extends('layouts.master')
@section('title', 'Kontrak/SP')
@section('content')
<div class="container-fluid mt-3">
    {{-- notification area --}}
    @if (session('message-success'))
        <div class="alert alert-success">{{session('message-success')}}</div>
    @elseif (session('message-success-update'))
        <div class="alert alert-success">{{session('message-success-update')}}</div>
    @elseif (session('message-error-delete'))
        <div class="alert alert-danger">{{session('message-error-delete')}}</div>
    @endif
    {{-- end notification area --}}
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail BA</h4>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>Nomor BA</th>
                                    <td>{{$kontrakBA->no_ba}}</td>
                                </tr>
                                <tr>
                                    <th>Uraian</th>
                                    <td>{{$kontrakBA->uraian}}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>{{$kontrakBA->tgl}}</td>
                                </tr>
                                <tr>
                                    <th>Periode</th>
                                    <td>{{$kontrakBA->tgl_awal}} s/d {{$kontrakBA->tgl_akhir}}</td>
                                </tr>
                                @if ($kontrakBA->getKontrakBAFile->count() != null)
                                <tr>
                                    <th rowspan="{{$kontrakBA->getKontrakBAFile->count() + 1}}">File</th>
                                    @foreach ($kontrakBA->getKontrakBAFile->all() as $file)
                                    <tr>
                                        <td><a href="{{asset('kontrakBA/' . $file->file)}}">{{$file->file}}</a></td>
                                    </tr>
                                    @endforeach
                                </tr>    
                                @else
                                <tr>
                                    <th>File</th>
                                    <td>Tidak ada dokumen. Klik <a href="/ba-edit/{{$kontrakBA->kd_ba}}">disini</a> untuk upload file.</td>
                                </tr>
                                @endif
                            </table>
                        </div>                       
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Keterangan Kontrak/SP</h4>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>Nomor Kontrak/SP</th>
                                    <td>{{$kontrakBA->getKontrak->no_sp}}</td>
                                </tr>
                                <tr>
                                    <th>Cost Center</th>
                                    <td>{{$kontrakBA->getKontrak->getRkapDetail->getRkap->cost_center}}</td>
                                </tr>
                                <tr>
                                    <th>Gl. Account/Commit Item</th>
                                    <td>{{$kontrakBA->getKontrak->getRkapDetail->getRkap->gl_acc}} / {{$kontrakBA->getKontrak->getRkapDetail->nama_aktifitas}}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{$kontrakBA->getKontrak->deskripsi}}</td>
                                </tr>
                                <tr>
                                    <th>uraian</th>
                                    <td>{{$kontrakBA->getKontrak->uraian}}</td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td>{{$kontrakBA->getKontrak->keterangan}}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Kontrak/SP</th>
                                    <td>{{$kontrakBA->getKontrak->tgl}}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="general-button">
                            <button class="btn btn-primary" onclick="window.location.href='/ba'">Back</button>
                            @if (Auth::user()->role == 'Admin')
                                <button class="btn btn-primary" onclick="window.location.href='/ba-edit/{{$kontrakBA->kd_ba}}'">Edit</button>
                                <button class="btn btn-danger" onclick="window.location.href='/ba-delete/{{$kontrakBA->kd_ba}}'">Delete</button>
                            @endif    
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection