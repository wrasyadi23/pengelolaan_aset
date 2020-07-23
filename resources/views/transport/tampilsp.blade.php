@extends('layouts.master')
@section('title','Data Sp Sewa')
@section('content')
<div class="container-fluid mt-3">
    @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="row">
        <div class="form-group col-md-8">
            <input type="text" name="key" id="" class="form-control" placeholder="Panggil No.Um">
        </div>
        <div class="form-group col-md-4">
            <button type="submit" class="btn btn-primary">Cari</button>
            <button type="reset" class="btn btn-primary" onclick="window.location.href='/uangmuka'">Reset</button>
            <a href="/transport/spsewa" class="btn btn-success">Sp Baru</a>
        </div> 
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Sp Sewa</h4>
                    <div class="card-content">
                        {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class = "table-secondary">
                                        <th>No.Sp</th>
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
                                        <td>{{ $sp->no_sp }}</td>
                                        <td>{{ $sp->tgl }}</td>
                                        <td>{{ $sp->cost_center }}</td>
                                        <td>{{ $sp->gl_account }}</td>
                                        <td>{{ $sp->deskripsi }}</td>
                                        <td>{{ $sp->jml }}</td>
                                        <td><div align="right"><span class="style1">{{ number_format($sp->harga,0) }}</span></div></td>
                                        <td>{{ $sp->satuan }}</td>
                                        <td><div align="right"><span class="style1">{{ number_format($sp->total_harga,0) }}</span></div></td>
                                        <td>{{ $sp->rekanan }}</td>
                                        <td>{{ $sp->status }}</td>
                                        <th>
                                            <a href="/uangmuka/real_um/{{ $sp->id }}" class="badge badge-primary">Edit</a>
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