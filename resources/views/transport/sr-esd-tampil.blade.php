<style type="text/css">
    .style1 {color: #0000FF}
    .style2 {color: #000000}
    </style>
    @extends('layouts.master')
    @section('title','Data Service Request Sewa Esidentil')
    @section('content')
    <div class="container-fluid mt-3">
        @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title style1">Data Service Request Sewa Esidentil</h4>
                        <form action="/transport/sr-cari" method="get">
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <input type="text" name="key" id="" class="form-control" placeholder="Panggil Service Request">
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                    <button type="reset" class="btn btn-primary" onclick="window.location.href='/transport/sr-tampil'">Reset</button>
                                    <a href="/transport/sr-esd-create" class="btn btn-success">SR Esd Baru</a>
                                </div> 
                        </form>
                        <div class="card-content">
                            {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped zero-configuration" style="width: 100%;">
                                    <thead>
                                        <tr class = "table-secondary">
                                            <th><div align="center">No</div></th>
                                            <th><div align="center">Kode.Sr</div></th>
                                            <th><div align="center">No.Sr</div></th>
                                            <th><div align="center">Uraian</div></th>
                                            <th><div align="center">Tahun</div></th>
                                            <th><div align="center">Tanggal</div></th>
                                            <th><div align="center">Mulai</div></th>
                                            <th><div align="center">Sampai</div></th>
                                            <th><div align="center">Dipergunakan</div></th>
                                            <th><div align="center">Total Harga</div></th>
                                            <th><div align="center">Rekanan</div></th>
                                            <th><div align="center">Aksi</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($sresd as $result => $esd)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $esd->kd_sr }}</td>
                                            <td>{{ $esd->getSR->no_sr }}</td>
                                            <td>Sewa Kendaraan {{ $esd->getKendaraan->jenis_kend }} {{ $esd->getKendaraan->merk }}</td>
                                            <td>{{ $esd->getKendaraan->tahun }}</td>
                                            <td>{{ $esd->getSR->tgl }}</td>
                                            <td>{{ $esd->getSR->tgl_awal }}</td>
                                            <td>{{ $esd->getSR->tgl_akhir }}</td>
                                            <td>{{ $esd->getKendaraan->warna }}</td> 
                                            <td><div align="right"><span class="style1">{{ number_format($esd->getTarif->harga,0) }}</span></div></td>
                                            
                                            <th>
                                                <a href="/transport/sr-esd-edit/{{ $esd->kd_sr }}" class="badge badge-primary">Isi No.Sr</a>
                                                <a href="/transport/sr-esd-print/{{ $esd->kd_sr }}" class="badge badge-primary">Print</a>
                                                <a href="/transport/sr-esd-detail/{{ $esd->kd_sr }}" class="badge badge-primary">Detail</a>
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