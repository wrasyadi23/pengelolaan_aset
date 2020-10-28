@extends('layouts.master')
@section('title', 'Kontrak/SP')
@section('content')
<div class="container-fluid mt-3">
    @if (session('message-success'))
        <div class="alert alert-success">{{session('message-success')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail Kontak/SP</h4>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>Nomor Kontrak/SP</th>
                                    <td>{{$kontrak->no_sp}}</td>
                                </tr>
                                <tr>
                                    <th>Cost Center</th>
                                    <td>{{$kontrak->getRkapDetail->getRkap->cost_center}}</td>
                                </tr>
                                <tr>
                                    <th>Gl. Account/Commit Item</th>
                                    <td>{{$kontrak->getRkapDetail->getRkap->gl_acc}} / {{$kontrak->getRkapDetail->nama_aktifitas}}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{$kontrak->deskripsi}}</td>
                                </tr>
                                <tr>
                                    <th>uraian</th>
                                    <td>{{$kontrak->uraian}}</td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td>{{$kontrak->keterangan}}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Kontrak/SP</th>
                                    <td>{{$kontrak->tgl}}</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>Rp. {{ number_format($kontrak->harga,0) }}</td>
                                </tr>
                                <tr>
                                    <th>Jumlah/Satuan</th>
                                    <td>{{$kontrak->jml}} / {{$kontrak->satuan}}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if ($kontrak->status == "Requested")
                                        <a href="" class="badge badge-warning">{{$kontrak->status}}</a>
                                        @elseif ($kontrak->status == "Aktif")
                                        <a href="" class="badge badge-success">{{$kontrak->status}}</a>
                                        @else
                                        <a href="" class="badge badge-danger">{{$kontrak->status}}</a>
                                        @endif    
                                    </td>
                                </tr>
                                @if ($kontrak->getKontrakFile->count() != null)
                                <tr>
                                    <th rowspan="{{$kontrak->getKontrakFile->count() + 1}}">File</th>
                                    @foreach ($kontrak->getKontrakFile->all() as $file)
                                    <tr>
                                        <td><a href="{{asset('kontrak/' . $file->file)}}">{{$file->file}}</a></td>
                                    </tr>
                                    @endforeach
                                </tr>    
                                @else
                                <tr>
                                    <th>File</th>
                                    <td>Tidak ada dokumen. Klik <a href="/sp-edit/{{$kontrak->kd_sp}}">disini</a> untuk upload file.</td>
                                </tr>
                                @endif
                            </table>
                        </div>
                        <div class="general-button">
                            <button class="btn btn-primary" onclick="window.location.href='/sp'">Back</button>
                            @if (Auth::user()->role == 'Admin')
                                <button class="btn btn-primary" onclick="window.location.href='/sp-edit/{{$kontrak->kd_sp}}'">Edit</button>
                                <button class="btn btn-danger" onclick="window.location.href='/sp-delete/{{$kontrak->kd_sp}}'">Delete</button>
                            @endif    
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection