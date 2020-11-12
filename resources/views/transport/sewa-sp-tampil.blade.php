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
                    <h4 class="card-title">Data Sp Sewa</h4>
                    <form action="/transport/cari" method="get">
                        <div class="row">
                            <div class="form-group col-md-8">
                                <input type="text" name="key" id="" class="form-control" placeholder="Panggil No.Sp Sewa">
                            </div>
                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-primary">Cari</button>
                                <button type="reset" class="btn btn-primary" onclick="window.location.href='/transport/tampilsp'">Reset</button>
                                <a href="/transport/sewa-sp-create" class="btn btn-success">Sp Baru</a>
                            </div> 
                    </form>
                    <div class="card-content">
                        {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class = "table-secondary">
                                        <th>No</th>
                                        <th><div align="center">No.Sp</div></th>
                                        <th>Tanggal</th>
                                        <th>Cost Center</th>
                                        <th>Gl Account</th>
                                        <th>Merk</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Satuan</th>
                                        <th>Total Harga</th>
                                        <th>Rekanan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getspsewa as $result => $sp)
                                    <tr>
                                        <td><div align="center">{{ $result + $getspsewa->firstitem() }}</div></td>
                                        <td><div align="center">{{ $sp->no_sp }}</div></td>
                                        <td><div align="center">{{ $sp->tgl }}</div></td>
                                        <td><div align="center">{{ $sp->getRkapDetail->getRkap->cost_center }}</div></td>
                                        <td><div align="center">{{ $sp->getRkapDetail->getRkap->gl_acc }}</div></td>
                                        <td>{{ $sp->deskripsi }}</td>
                                        <td><div align="center">{{ $sp->jml }}</div></td>
                                        <td><div align="right"><span class="style1">{{ number_format($sp->harga,0) }}</span></div></td>
                                        <td><div align="center">{{ $sp->satuan }}</div></td>
                                        <td><div align="right"><span class="style1">{{ number_format($sp->harga*$sp->jml) }}</span></div></td>
                                        <td><div align="center">{{ $sp->rekanan }}</div></td>
                                        <td>{{ $sp->status }}</td>
                                        <th>
                                            <a href="/transport/sewa-sp-edit/{{ $sp->id }}" class="badge badge-primary">Edit</a>                                        </th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $getspsewa->links()}}
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection