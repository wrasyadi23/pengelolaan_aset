@extends('layouts.master')
@section('title','Data Tarif Sewa')
@section('content')
<div class="container-fluid mt-3">
    @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Tarif Sewa</h4>
                    <form action="/transport/sewa-tarif-cari" method="get">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <input type="text" name="key" id="" class="form-control" placeholder="Panggil Klasifikasi">
                            </div>
                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-primary">Cari</button>
                                <button type="reset" class="btn btn-primary" onclick="window.location.href='/transport/sewa-tarif-tampil'">Reset</button>
                                <a href="/transport/sewa-tarif-create" class="btn btn-success">Tarif Sewa Baru</a>
                            </div> 
                    </form>
                    <div class="card-content">
                        {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class = "table-secondary">
                                        <th><div align="center">No</div></th>
                                        <th><div align="center">Klasifikasi</div></th>
                                        <th><div align="center">Merk Kendaraan</div></th>
                                        <th><div align="center">Type Kend</div></th>
                                        <th><div align="center">Tahun</div></th>
                                        <th><div align="center">Jenis</div></th>
                                        <th><div align="center">Harga/Hari</div></th>
                                        <th><div align="center">Aksi</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getTarifEsd as $result => $sp)
                                    <tr>
                                        <td>{{ $result + $getTarifEsd->firstitem() }}</td>
                                        <td>{{ $sp->klasifikasi_tarif }}</td>
                                        <td>{{ $sp->merk }}</td>
                                        <td>{{ $sp->type }}</td>
                                        <td>{{ Carbon\Carbon::parse($sp->getKontrakBA->getKontrak->tgl)->format('Y') }}</td>
                                        <td>{{ $sp->jenis_kend }}</td>
                                        <td><div align="right"><span class="style1">{{ number_format($sp->harga,0) }}</span></div></td>
                                        <th>
                                            <a href="/transport/sewa-tarif-edit/{{ $sp->kd_tarif }}" class="badge badge-primary">Edit</a>                                        </th>
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