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
                                <button class="btn btn-primary" onclick="window.location.href='/transport/clearing-create'">+ Baru</button>
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
                                            <th><div align="center">No. Uangmuka</div></th>
                                            <th><div align="center">Tgl UM</div></th>
                                            <th><div align="center">No.Wum</div></th>
                                            <th><div align="center">Tanggal Wum</div></th>
                                            <th><div align="center">no. Clearing</div></th>
                                            <th><div align="center">Tgl Clearing</div></th>
                                            <th><div align="center">Total Harga</div></th>
                                            <th><div align="center">Aksi</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                            $total = 0;
                                        @endphp
                                        @foreach ($clearing as $result => $clr)
                                            
                                        <tr>
                                            <td><div align="center">{{ $no++ }}</div></td>
                                            <td><div align="left">{{ $clr->getWUM->getUangmuka->uraian }}</div></td>
                                            <td align="center"><div>{{ $clr->getWUM->getUangmuka->no_uangmuka}}</div></td>  
                                            <td align="center"><div>{{ $clr->getWUM->getUangmuka->tgl}}</div></td>                
                                            <td><div align="center">{{ $clr->getWUM->no_wum }}</div></td>
                                            <td><div align="center">{{ $clr->getWUM->tgl }}</div></td>
                                            <td><div align="center">{{ $clr->no_clearing }}</div></td>
                                            <td><div align="center">{{ $clr->tgl }}</div></td>
                                            <td align="right"><div>{{number_format($total) }}</div></td>
                                            <th>
                                                <div align="center"><a href="/transport/umperjaka-realdet-tampil/{{ $clr->kd_real_um }}" class="badge badge-primary">Detail</a> </div></th>
                                                
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