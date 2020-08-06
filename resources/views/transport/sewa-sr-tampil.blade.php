@extends('layouts.master')
@section('title','Data SR Sewa Kendaraan')
@section('content')
<div class="container-fluid mt-3">
    @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data SR Sewa Keendaraan</h4>
                    <form action="/transport/cari" method="get">
                        <div class="row">
                            <div class="form-group col-md-8">
                                <input type="text" name="key" id="" class="form-control" placeholder="Panggil No.Sp Sewa">
                            </div>
                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-primary">Cari</button>
                                <button type="reset" class="btn btn-primary" onclick="window.location.href='/transport/tampilsp'">Reset</button>
                                <a href="/transport/sewa-sr-create" class="btn btn-success">SR Baru</a>
                            </div> 
                    </form>
                    <div class="card-content">
                        {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class = "table-secondary">
                                        <th><div align="center">No</div></th>
                                        <th><div align="center">No.Sr</div></th>
                                        <th><div align="center">Tanggal</div></th>
                                        <th><div align="center">Cost Center</div></th>
                                        <th><div align="center">Gl Account</div></th>
                                        <th><div align="center">Mulai</div></th>
                                        <th><div align="center">Sampai</div></th>
                                        <th><div align="center">No. Kontrak</div></th>
                                        <th><div align="center">Harga</div></th>
                                        <th><div align="center">Satuan</div></th>
                                        <th><div align="center">Total Harga</div></th>
                                        <th><div align="center">Rekanan</div></th>
                                        <th><div align="center">Status</div></th>
                                        <th><div align="center">Aksi</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sr as $result => $sp)
                                    <tr>
                                        <td>{{ $result + $sr->firstitem() }}</td>
                                        <td>{{ $sp->no_sr }}</td>
                                        <td>{{ $sp->tgl }}</td>
                                        <td>{{ $sp->cost_center }}</td>
                                        <td>{{ $sp->cost_center }}</td>
                                        <td>{{ $sp->tgl_awal }}</td>
                                        <td>{{ $sp->tgl_akhir }}</td>
                                        <td>{{ $sp->getkontrakBA->no_ba }}</td>                                       
                                        <td><div align="right"><span class="style1">{{ number_format($sp->harga,0) }}</span></div></td>
                                        <td>{{ $sp->satuan }}</td>
                                        <td><div align="right"><span class="style1">{{ number_format($sp->harga*$sp->jml) }}</span></div></td>
                                        <td>{{ $sp->rekanan }}</td>
                                        <td>{{ $sp->status }}</td>
                                        <th>
                                            <a href="/transport/sewa-sr-edit/{{ $sp->id }}" class="badge badge-primary">Edit</a>                                        </th>
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