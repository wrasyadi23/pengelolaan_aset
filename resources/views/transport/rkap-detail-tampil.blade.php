<style type="text/css">
    .style1 {color: #0000FF}
    .style2 {color: #000000}
    </style>
    @extends('layouts.master')
    @section('title','Data RKAP Detailt')
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
                                <h4 class="card-title style1">Data RKAP Detail</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-primary" onclick="window.location.href='/transport/rkapdet-create'">+ Baru</button>
                            </div>
                        </div>
                        <div class="card-content">
                            {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped zero-configuration" style="width: 100%;">
                                    <thead>
                                        <tr class = "table-secondary">
                                            <th><div align="center">No</div></th>
                                            <th><div align="center">Kode Aktifitas</div></th>
                                            <th><div align="center">Cost Center</div></th>
                                            <th><div align="center">Account</div></th>
                                            <th><div align="center">Aktifitas</div></th>
                                            <th><div align="center">Nama Aktifitas</div></th>
                                            <th><div align="center">Uraian</div></th>
                                            <th><div align="center">Nilai Aktifitas</div></th>
                                            <th><div align="center">Bagian</div></th>
                                            <th><div align="center">Aksi</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                            $total = 0;
                                        @endphp
                                        @foreach ($rkapdetail as $result => $rkap)
                                        <tr>
                                            <td><div align="center">{{ $no++ }}</div></td>
                                            <td><div align="center">{{ $rkap->kd_aktifitas_rkap }}</div></td>
                                            <td><div>{{ $rkap->getRkap->cost_center }}</div></td>  
                                            <td><div>{{ $rkap->getRkap->gl_acc }}</div></td>                
                                            <td><div align="center">{{ $rkap->aktifitas }}</div></td>
                                            <td><div>{{ $rkap->nama_aktifitas }}</div></td>
                                            <td><div>{{ $rkap->uraian }}</div></td> 
                                            <td align="right">{{ number_format($rkap->nilai_aktifitas,0) }}</td> 
                                            <td><div>{{ $rkap->getBagian->bagian }}</div></td>    
                                            <th>
                                                <div align="center"><a href="/transport/rkap-detail-edit/{{ $rkap->kd_aktifitas_rkap }}" class="badge badge-primary">Edit</a> </div></th>
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