<style type="text/css">
    .style1 {color: #0000FF}
    .style2 {color: #000000}
    </style>
    @extends('layouts.master')
    @section('title','Data Realisasi')
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
                                <h4 class="card-title style1">Data Realisasi</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-primary" onclick="window.location.href='/transport/umperjaka-realisasi'">+ Baru</button>
                            </div>
                        </div>
                        <div class="card-content">
                            {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped zero-configuration" style="width: 100%;">
                                    <thead>
                                        <tr class = "table-secondary">
                                            <th><div align="center">No</div></th>
                                            <th><div align="center">Uraian</div></th>
                                            <th><div align="center">Nilai</div></th>
                                            <th><div align="center">Jumlah</div></th>
                                            <th><div align="center">Total Harga</div></th>
                                            <th><div align="center">Keterangan</div></th>
                                            <th><div align="center">Aksi</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                            $total = 0;
                                        @endphp
                                        @foreach ($realdet as $result => $real)
                                            @php
                                                // $tglAwal[$result] = \Carbon\Carbon::parse($sp->getSR->tgl_awal);
                                                // $tglAkhir[$result] = \Carbon\Carbon::parse($sp->getSR->tgl_akhir);
                                                // $hari[$result] = $tglAwal[$result]->diffInDays($tglAkhir[$result]) + 1;
                                                $subtotal[$result] = $real->harga * $real->jumlah;
                                                $total = $subtotal[$result] + $total;
                                            @endphp
                                        <tr>
                                            <td><div align="center">{{ $no++ }}</div></td>
                                            <td><div align="left">{{ $real->uraian }}</div></td>
                                            <td align="right"><div>{{ $real->harga}}</div></td>  
                                            <td><div align="center">{{ $real->jumlah }}</div></td>
                                            <td align="right"><div>{{number_format($total) }}</div></td>
                                            {{-- <td align="center"><div>{{ $real->tgl}}</div></td>                 --}}
                                            @if ( $real->keterangan == "UM")
                                            <td><div align="center">{{ $real->keterangan }}</div></td>
                                            @else
                                            <td><div align="center">{{ $real->keterangan }}</div></td>
                                            @endif
                                            {{-- <td><div align="center">{{ $real->getRealisasiUm->tgl }}</div></td> --}}
                                            <th>
                                                <a href="/transport/umperjaka-cetak/{ kd_uangmuka }" class="badge badge-success">Cetak</a>
                                                <a href="/transport/umperjaka-view/{kd_real_um}" class="badge badge-success">Print</a>
                                                @if ( $real->keterangan == "UM")
                                                <a href="/transport/umperjaka-realdet-tampil/{{ $real->kd_real_um }}" class="badge badge-primary">Detail</a>
                                                @else
                                                <a href="/transport/umperjaka-ptk-detail-tampil/{{ $real->kd_real_um }}" class="badge badge-primary">Detail</a>
                                                @endif
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