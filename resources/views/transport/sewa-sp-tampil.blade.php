<style type="text/css">
    .style1 {color: #0000FF}
    .style2 {color: #000000}
    </style>
    @extends('layouts.master')
    @section('title','Data SP Sewa')
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
                                <h4 class="card-title style1">Data SP Sewa</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-primary" onclick="window.location.href='/transport/sewa-sp-create'">+ SP Baru</button>
                            </div>
                        </div>
                        <div class="card-content">
                            {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped zero-configuration" style="width: 100%;">
                                    <thead>
                                        <tr class = "table-secondary">
                                            <th>No</th>
                                        <th><div align="center">No.Sp</div></th>
                                        <th>Tanggal</th>
                                        {{-- <th>Cost Center</th>
                                        <th>Gl Account</th> --}}
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
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($getspsewa as $result => $sp)
                                        <tr>
                                            <td><div align="center">{{ $result + $getspsewa->firstitem() }}</div></td>
                                            <td><div align="center">{{ $sp->no_sp }}</div></td>
                                            <td><div align="center">{{ $sp->tgl }}</div></td>
                                            {{-- <td><div align="center">{{ $sp->getRkapDetail->getRkap->cost_center }}</div></td>
                                            <td><div align="center">{{ $sp->getRkapDetail->getRkap->gl_acc }}</div></td> --}}
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection