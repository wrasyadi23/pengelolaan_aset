<style type="text/css">
    .style1 {color: #0000FF}
    .style2 {color: #000000}
    </style>
    @extends('layouts.master')
    @section('title','Data Tarif Sewa ESD')
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
                                <h4 class="card-title style1">Data Tarif Sewa ESD</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-primary" onclick="window.location.href='/transport/sewa-tarif-create'">+ Tarif Sewa Baru</button>
                            </div>
                        </div>
                        <div class="card-content">
                            {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped zero-configuration" style="width: 100%;">
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
                                        @php
                                            $no = 1;
                                        @endphp
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
                                                 <a href="/transport/sewa-tarif-edit/{{ $sp->kd_tarif }}" class="badge badge-primary">Edit</a>                                       
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