<style type="text/css">
    .style1 {color: #0000FF}
    .style2 {color: #000000}
    </style>
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
                        <div class="form-row">
                            <div class="col-md-6">
                                <h4 class="card-title style1">Data Kendaraan Sewa</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-primary" onclick="window.location.href='/transport/kendaraan-invest-create'">+ Kend. Invest</button>
                            </div>
                        </div>
                        <div class="card-content">
                            {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped zero-configuration" style="width: 100%;">
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
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($kendaraan as $result => $sp)
                                        <tr>
                                            <td align="center">{{ $no++ }}</td>
                                            <td>{{ $sp->kd_kendaraan }}</td>
                                            <td align="center">{{ $sp->nopol }}</td>
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
                                            <td align="center">{{ $sp->status }}</td>
                                            <th>
                                                <a href="/transport/kendaraan-invest-edit/{{ $sp->id }}" class="badge badge-primary">Edit</a>                                        </th>
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