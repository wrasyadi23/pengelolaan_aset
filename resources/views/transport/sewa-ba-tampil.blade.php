@extends('layouts.master')
@section('title','Data Sp Sewa')
@section('content')
<div class="container-fluid mt-3">
    @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Ba Kendaraan Sewa</h4>
                    <form action="/transport/cari" method="get">
                        <div class="row">
                            <div class="form-group col-md-8">
                                <input type="text" name="key" id="" class="form-control" placeholder="Panggil No.Sp Sewa">
                            </div>
                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-primary">Cari</button>
                                <button type="reset" class="btn btn-primary" onclick="window.location.href='/transport/tampilsp'">Reset</button>
                                <a href="/transport/sewa-ba-create" class="btn btn-success">Ba Kendaraan Baru</a>
                            </div> 
                    </form>
                    <div class="card-content">
                        {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class = "table-secondary">
                                        <th><div align="center">No</div></th>
                                        <th><div align="center">No.Ba</div></th>
                                        <th><div align="center">No.Sp</div></th>
                                        <th><div align="center">Tanggal</div></th>
                                        <th><div align="center">Uraian</div></th>
                                        <th><div align="center">Jumlah</div></th>
                                        <th><div align="center">Harga</div></th>
                                        <th><div align="center">Satuan</div></th>
                                        <th><div align="center">Total Harga</div></th>
                                        <th><div align="center">Rekanan</div></th>
                                        <th><div align="center">Status</div></th>
                                        <th><div align="center">Aksi</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($basewa as $result => $sp)
                                    <tr>
                                        <td><div align="center">{{ $result + $basewa->firstitem() }}</div></td>
                                        <td>{{ $sp->no_ba }}</td>
                                        <td>{{ $sp->getkontrak->no_sp }}</td>
                                        <td>{{ $sp->tgl }}</td>
                                        <td>{{ $sp->uraian }}</td>
                                        <td><div align="center">{{ $sp->getkontrak->jml }}</div></td>
                                        <td><div align="right"><span class="style1">{{ number_format($sp->getkontrak->harga,0) }}</span></div></td>
                                        <td><div align="center">{{ $sp->getkontrak->satuan }}</div></td>
                                        <td><div align="right"><span class="style1">{{ number_format($sp->getkontrak->harga*$sp->getkontrak->jml) }}</span></div></td>
                                        <td><div align="center">{{ $sp->getkontrak->rekanan }}</div></td>
                                        <td>{{ $sp->getkontrak->status }}</td>
                                        <th>
                                            <a href="/transport/sewa-ba-edit/{{ $sp->kd_ba }}" class="badge badge-primary">Edit</a>                                        </th>
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