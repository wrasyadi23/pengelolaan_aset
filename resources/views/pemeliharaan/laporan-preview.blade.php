
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('quixlab/css/style.css')}}" rel="stylesheet">
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <div class="container-fluid mt-3">
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
                                <th>{{$countPekerjaanClosed}}</th>
                                <th>{{$countPekerjaanTotal}}</th>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="page-break"></div>
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
        <div class="page-break"></div>
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
        <div class="page-break"></div>
    </div>
</body>
</html>