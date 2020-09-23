@extends('layouts.master')
@section('title','Data Kendaraan Sewa')
@section('content')
<div class="container-fluid mt-3">
    @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Kendaraan Sewa</h4>
                    <form action="/transport/cari1" method="get">
                        <div class="row">
                            <div class="form-group col-md-8">
                                <input type="text" name="key" id="" class="form-control" placeholder="Panggil Nopol">
                            </div>
                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-primary">Cari</button>
                                <button type="reset" class="btn btn-primary" onclick="window.location.href='/transport/kendaraan-tampil'">Reset</button>
                                <a href="/transport/kendaraan-create" class="btn btn-success">Kend. Baru</a>
                            </div> 
                    </form>
                    <div class="card-content">
                        {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class = "table-secondary">
                                        <th><div align="center">No</div></th>
                                        <th><div align="center">Kode Kend</div></th>
                                        <th><div align="center">Nopol</div></th>
                                        <th><div align="center">Merk Kendaraan</div></th>
                                        <th><div align="center">Type Kend</div></th>
                                        <th><div align="center">Jenis</div></th>
                                        <th><div align="center">Warna</div></th>
                                        <th><div align="center">Jatah Bbm</div></th>
                                        <th><div align="center">Jenis Bbm</div></th>
                                        <th><div align="center">No. Mesin</div></th>
                                        <th><div align="center">No. Rangka</div></th>
                                        <th><div align="center">Departemen</div></th>
                                        <th><div align="center">Bagian</div></th>
                                        <th><div align="center">Status</div></th>
                                        <th><div align="center">Aksi</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kendaraan as $result => $sp)
                                    <tr>
                                        <td>{{ $result + $kendaraan->firstitem() }}</td>
                                        <td>{{ $sp->kd_kendaraan }}</td>
                                        <td>{{ $sp->nopol }}</td>
                                        <td>{{ $sp->merk }}</td>
                                        <td>{{ $sp->type }}</td>
                                        <td>{{ $sp->jenis }}</td>
                                        <td>{{ $sp->warna }}</td>
                                        <td><div align="right"><span class="style1">{{ number_format($sp->jml_bbm,0) }}</span></div></td>
                                        <td>{{ $sp->jenis_bbm }}</td>
                                        <td>{{ $sp->no_mesin }}</td>
                                        <td>{{ $sp->no_rangka }}</td>
                                        <td>{{ $sp->kd_departemen }}</td>
                                        <td>{{ $sp->kd_bagian }}</td>
                                        <td>{{ $sp->status }}</td>
                                        <th>
                                            <a href="/transport/kendaraan-edit/{{ $sp->id }}" class="badge badge-primary">Edit</a>                                        </th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $kendaraan->links()}}
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection