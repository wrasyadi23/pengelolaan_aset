<style type="text/css">
    .style1 {color: #0000FF}
    .style2 {color: #000000}
    </style>
    @extends('layouts.master')
    @section('title','Data RKAP')
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
                                <h4 class="card-title style1">Data RKAP</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-primary" onclick="window.location.href='/transport/rkap-create'">+ Baru</button>
                            </div>
                        </div>
                        <div class="card-content">
                            {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped zero-configuration" style="width: 100%;">
                                    <thead>
                                        <tr class = "table-secondary">
                                            <th><div align="center">No</div></th>
                                            <th><div align="center">Kode kd_rkap</div></th>
                                            <th><div align="center">Cost Center</div></th>
                                            <th><div align="center">Account</div></th>
                                            <th><div align="center">Tahun Rkap</div></th>
                                            <th><div align="center">Nilai Rkap</div></th>
                                            <th><div align="center">Status</div></th>
                                            <th><div align="center">Aksi</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                            $total = 0;
                                        @endphp
                                        @foreach ($rkap as $result => $item)    
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{$item->kd_rkap}}</td>
                                        <td>{{$item->cost_center}}</td>
                                        <td>{{$item->gl_acc}}</td>
                                        <td>{{$item->tahun_rkap}}</td>
                                        <td align="right">{{ number_format($item->nilai_rkap,0) }}</td>
                                        <td align="center">{{$item->status}}</td>
                                        <td align="center"><a href="/transport/rkap-edit/{{$item->id}}" class="badge badge-success">Edit</a></td>
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