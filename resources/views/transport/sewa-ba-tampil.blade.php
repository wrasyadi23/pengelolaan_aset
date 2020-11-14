<style type="text/css">
    .style1 {color: #0000FF}
    .style2 {color: #000000}
    </style>
    @extends('layouts.master')
    @section('title','Data BA Sewa Kendaraan')
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
                                <h4 class="card-title style1">Data BA Sewa Kendaraan</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-primary" onclick="window.location.href='/transport/sewa-ba-create'">+ BA Baru</button>
                            </div>
                        </div>
                        <div class="card-content">
                            {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped zero-configuration" style="width: 100%;">
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
                                        @php
                                            $no = 1;
                                        @endphp
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
                                            <td><div align="right"><span class="style1">{{ number_format($sp->getkontrak->harga * $sp->getkontrak->jml),0}}</span></div></td>
                                            <td><div align="center">{{ $sp->getkontrak->rekanan }}</div></td>
                                            <td>{{ $sp->getkontrak->status }}</td>
                                            <th>
                                                <a href="/transport/sewa-ba-edit/{{ $sp->kd_ba }}" class="badge badge-primary">Edit</a>                                        
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