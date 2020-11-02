<style type="text/css">
.style1 {color: #0000FF}
.style2 {color: #000000}
</style>
@extends('layouts.master')
@section('title','Data Service Request Transport')
@section('content')
<div class="container-fluid mt-3">
    @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-6">
                            <h4 class="card-title style1">Data Service Request Transport</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <button class="btn btn-primary" onclick="window.location.href='/transport/sr-create'">+ SR Baru</button>
                        </div>
                    </div>
                    <div class="card-content">
                        {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped zero-configuration" style="width: 100%;">
                                <thead>
                                    <tr class = "table-secondary">
                                        <th><div align="center">No</div></th>
                                        <th><div align="center">Kode.Sr</div></th>
                                        <th><div align="center">No.Sr</div></th>
                                        <th><div align="center">Tanggal</div></th>
                                        <th><div align="center">Mulai</div></th>
                                        <th><div align="center">Sampai</div></th>
                                        <th><div align="center">Uraian</div></th>
                                        <th><div align="center">Rekanan</div></th>
                                        <th><div align="center">Aksi</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($sr as $result => $sp)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $sp->kd_sr }}</td>
                                        <td>{{ $sp->no_sr }}</td>
                                        <td>{{ $sp->tgl }}</td>
                                        <td>{{ $sp->tgl_awal }}</td>
                                        <td>{{ $sp->tgl_akhir }}</td> 
                                        <td>{{ $sp->getKontrakBA->getKontrak->uraian }}..{{ $sp->getKontrakBA->getKontrak->jml }} {{ $sp->getKontrakBA->getKontrak->satuan }}</td>                                
                                        <td>{{ $sp->getKontrakBA->getKontrak->rekanan }}</td>
                                        <th>
                                            <a href="/transport/sr-edit/{{ $sp->id }}" class="badge badge-primary">Isi No.Sr</a>
                                            <a href="/transport/sr-preview/{{ $sp->kd_sr }}" class="badge badge-primary">Print</a>
                                            <a href="/transport/sr-detail/{{ $sp->kd_sr }}" class="badge badge-primary">Detail</a>  
                                        </th>
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
@endsection