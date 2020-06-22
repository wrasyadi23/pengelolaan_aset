@extends('layouts.master')
@section('title','Laporan Kegiatan')
@section('content')
<div class="container-fluid mt-3">
    {{-- @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
@endif --}}
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <h4 class="card-title">Laporan Kegiatan</h4>
                </div>
                <div class="card-content">
                    <div class="basic-form">
                        <form name="laporan" action="/pemeliharaan/laporan-search" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-sm-3">
                                    <input type="date" name="awal" id="" class="form-control input-default">
                                </div>
                                <div class="form-group col-sm-3">
                                    <input type="date" name="akhir" id="" class="form-control input-default">
                                </div>
                                <div class="form-group col-sm-6">
                                    <button type="submit" class="btn btn-primary"
                                            style="padding: 11px 20px 11px 20px;">Submit</button>
                                    <button type="reset" class="btn btn-primary"
                                            style="padding: 11px 20px 11px 20px;">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::user()->role == 'Admin')
        <div class="card">
            <div class="card-body">
                @if (empty($awal) && empty($akhir))
                <div class="card-content">
                    <div class="text-center">
                        <p>
                            <h4>Laporan Kegiatan {{Auth::user()->getKaryawan->getBagian->bagian}}</h4>
                        </p>
                        <p>
                            <h5>Tidak ada kegiatan.</h5>
                        </p>
                    </div>
                </div>
                @else
                <div class="card-content">
                    <div class="text-center">
                        <p>
                            <h4>Laporan Kegiatan {{Auth::user()->getKaryawan->getBagian->bagian}}</h4>
                        </p>
                        <p>
                            <h5>Periode : {{$awal}} - {{$akhir}}</h5>
                        </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered" style="width: 100%;">
                            <thead align="center">
                                <tr>
                                    {{-- <th rowspan="2">No</th> --}}
                                    <th rowspan="2">Seksi</th>
                                    <th rowspan="2">Regu</th>
                                    <th rowspan="2">Klasifikasi Pekerjaan</th>
                                    <th colspan="4">Kegiatan dalam Angka</th>
                                    <th rowspan="2">Total</th>
                                </tr>
                                <tr>
                                    <th>Requested</th>
                                    <th>Approved</th>
                                    <th>In Progres</th>
                                    <th>Done</th>
                                    <th>Closed</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rawData as $indexSeksi => $itemSeksi)
                                    @php
                                    $startSpanSeksi[$indexSeksi] = 0;
                                    @endphp

                                    @foreach ($itemSeksi->getRegu as $indexRegu => $itemRegu)
                                        @php
                                        $startSpanRegu[$indexRegu] = 0;
                                        @endphp

                                        @foreach ($itemRegu->getKlasifikasi as $indexKlasifikasi => $itemKlasifikasi)
                                            @php
                                            $startSpanSeksi[$indexSeksi]++;
                                            $startSpanRegu[$indexRegu]++
                                            @endphp

                                            <tr>
                                                @if ($startSpanSeksi[$indexSeksi] == 1)
                                                    <td rowspan="{{$countKlasifikasi[$loop->parent->parent->index]}}">
                                                        {{$itemSeksi->seksi}}
                                                    </td>
                                                @endif
                                                @if ($startSpanRegu[$indexRegu] == 1)    
                                                    <td rowspan="{{$itemRegu->getKlasifikasi->count()}}">
                                                        {{$itemRegu->regu}}
                                                    </td>
                                                @endif
                                                <td>{{$itemKlasifikasi->klasifikasi_pekerjaan}}</td>
                                                <td>{{$itemKlasifikasi->getPekerjaan->where('status', 'Requested')->count()}}</td>
                                                <td>{{$itemKlasifikasi->getPekerjaan->where('status', 'Approved')->count()}}</td>
                                                <td>{{$itemKlasifikasi->getPekerjaan->where('status', 'In Progress')->count()}}</td>
                                                <td>{{$itemKlasifikasi->getPekerjaan->where('status', 'Done')->count()}}</td>
                                                <td>{{$itemKlasifikasi->getPekerjaan->where('status', 'Closed')->count()}}</td>
                                                <td>{{$itemKlasifikasi->getPekerjaan->count()}}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endforeach
                                <th colspan="3">Grand Total</td>
                                <th>{{$countPekerjaanRequested}}</th>
                                <th>{{$countPekerjaanApproved}}</th>
                                <th>{{$countPekerjaanProgress}}</th>
                                <th>{{$countPekerjaanDone}}</th>
                                <th>{{$countPekerjaanClosed}}</th>
                                <th>{{$countPekerjaanTotal}}</th>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-row">
                        <button class="btn btn-primary" onclick="window.location.href='/pemeliharaan/laporan-preview/{{$awal}}/{{$akhir}}'">Print Laporan</button>
                    </div>
                </div>
                @endif
            </div>
        </div>
        @elseif (Auth::user()->role == 'Worker')
        <div class="card">
            <div class="card-body">
                @if (empty($awal) && empty($akhir))
                <div class="card-content">
                    <div class="text-center">
                        <p>
                            <h4>Laporan Kegiatan {{Auth::user()->getKaryawan->getRegu->regu}}</h4>
                        </p>
                        <p>
                            <h5>Tidak ada kegiatan.</h5>
                        </p>
                    </div>
                </div>
                @else
                <div class="card-content">
                    <div class="text-center">
                        <p>
                            <h4>Laporan Kegiatan {{Auth::user()->getKaryawan->getRegu->regu}}</h4>
                        </p>
                        <p>
                            <h5>Periode : {{$awal}} - {{$akhir}}</h5>
                        </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered" style="width: 100%;">
                            <thead align="center">
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Klasifikasi Pekerjaan</th>
                                    <th colspan="4">Kegiatan dalam Angka</th>
                                    <th rowspan="2">Total</th>
                                </tr>
                                <tr>
                                    <th>Requested</th>
                                    <th>Approved</th>
                                    <th>In Progres</th>
                                    <th>Done</th>
                                    <th>Closed</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rawData as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    {{-- Perlu pakai first() karena untuk ambil data dari table yang jadi acuan grouping / indexnya --}}
                                    <td>{{$item->first()->getKlasifikasi->klasifikasi_pekerjaan}}</td>
                                    <td>{{count($item->where('status', 'Requested'))}}</td>
                                    <td>{{count($item->where('status', 'Approved'))}}</td>
                                    <td>{{count($item->where('status', 'In Progress'))}}</td>
                                    <td>{{count($item->where('status', 'Done'))}}</td>
                                    <td>{{count($item->where('status', 'Closed'))}}</td>
                                    <td>{{count($item)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </div>
        @elseif (Auth::user()->role == 'User')
        <div class="card">
            <div class="card-body">
                @if (empty($awal) && empty($akhir))
                <div class="card-content">
                    <div class="text-center">
                        <p>
                            <h4>Laporan Permohonan {{Auth::user()->nama}} / {{Auth::user()->nik}}</h4>
                        </p>
                        <p>
                            <h5>Tidak ada permohonan.</h5>
                        </p>
                    </div>
                </div>
                @else
                <div class="card-content">
                    <div class="text-center">
                        <p>
                            <h4>Laporan Permohonan {{Auth::user()->nama}} / {{Auth::user()->nik}}</h4>
                        </p>
                        <p>
                            <h5>Periode : {{$awal}} - {{$akhir}}</h5>
                        </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered" style="width: 100%;">
                            <thead align="center">
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Klasifikasi Pekerjaan</th>
                                    <th colspan="4">Kegiatan dalam Angka</th>
                                    <th rowspan="2">Total</th>
                                </tr>
                                <tr>
                                    <th>Requested</th>
                                    <th>Approved</th>
                                    <th>In Progres</th>
                                    <th>Done</th>
                                    <th>Closed</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rawData as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    {{-- Perlu pakai first() karena untuk ambil data dari table yang jadi acuan grouping / indexnya --}}
                                    <td>{{$item->first()->getKlasifikasi->klasifikasi_pekerjaan}}</td>
                                    <td>{{count($item->where('status', 'Requested'))}}</td>
                                    <td>{{count($item->where('status', 'Approved'))}}</td>
                                    <td>{{count($item->where('status', 'In Progress'))}}</td>
                                    <td>{{count($item->where('status', 'Done'))}}</td>
                                    <td>{{count($item->where('status', 'Closed'))}}</td>
                                    <td>{{count($item)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>
</div>
@endsection