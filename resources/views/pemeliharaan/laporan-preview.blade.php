<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Preview</title>
    {{-- <link href="{{asset('quixlab/css/style.css')}}" rel="stylesheet"> --}}
    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        h1,h2 {
            text-align: center;
            margin: 2pxpx;
            padding: 0px;
        }
        h1 {
            font-size: 8pt;
            font-weight: bold;
            color: black;
        }
        h2 {
            font-size: 7pt;
            font-weight: bold;
            color:black;
        }
        .container {
            align-content: center;
            margin: 5px;;
        }
        table {
            border-collapse: collapse;
            padding-top: 5px;
            padding-bottom: 5px;
            width: 100%;
        }
        .grandtotal {
            font-size: 7pt;
            font-weight: bold;
            text-align: left;
            vertical-align: middle;
            background-color: #E0E0E0;
        }
        th, td {
            border: 1px solid #E0E0E0;
            padding: 2px;
        }
        th {
            font-size: 7pt;
            font-weight: bold;
            text-align: center;
            vertical-align: middle;
            background-color: #9E9E9E;
        }
        td {
            font-size: 6pt;
            text-align: left;
            vertical-align: top;
        }
    </style>
</head>
<body>
    <div class="container">
        @if (Auth::user()->role == 'Admin')
        <h1>Laporan Kegiatan {{Auth::user()->getKaryawan->getBagian->bagian}}</h1>
        <h2>Periode : {{$awal}} - {{$akhir}}</h2>
        <table>
            <tr>
                {{-- <th rowspan="2">No</th> --}}
                <th rowspan="2">Seksi</th>
                <th rowspan="2">Regu</th>
                <th rowspan="2">Klasifikasi Pekerjaan</th>
                <th colspan="5">Kegiatan dalam Angka</th>
                <th rowspan="2">Total</th>
            </tr>
            <tr>
                <th>Requested</th>
                <th>Approved</th>
                <th>In Progres</th>
                <th>Done</th>
                <th>Closed</th>
            </tr>
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
            <tr class="grandtotal">
                <td colspan="3">Grand Total</td>
                <td>{{$countPekerjaanRequested}}</td>
                <td>{{$countPekerjaanApproved}}</td>
                <td>{{$countPekerjaanProgress}}</td>
                <td>{{$countPekerjaanDone}}</td>
                <td>{{$countPekerjaanClosed}}</td>
                <td>{{$countPekerjaanTotal}}</td>
            </tr>
        </table>
        @elseif (Auth::user()->role == 'Worker')
        <h1>Laporan Kegiatan {{Auth::user()->getKaryawan->getRegu->regu}}</h1>
        <h2>Periode : {{$awal}} - {{$akhir}}</h2>
        <table>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Klasifikasi Pekerjaan</th>
                <th colspan="5">Kegiatan dalam Angka</th>
                <th rowspan="2">Total</th>
            </tr>
            <tr>
                <th>Requested</th>
                <th>Approved</th>
                <th>In Progres</th>
                <th>Done</th>
                <th>Closed</th>
            </tr>
            @foreach ($rawData as $item)
            <tr>
                <td>{{$no++}}</td>
                {{-- Perlu pakai first() karena untuk ambil data dari table yang jadi acuan grouping / indexnya --}}
                <td>{{$item->first()->getKlasifikasi->klasifikasi_pekerjaan}}</td>
                <td>{{$countPekerjaanRequested}}</td>
                <td>{{$countPekerjaanApproved}}</td>
                <td>{{$countPekerjaanProgress}}</td>
                <td>{{$countPekerjaanDone}}</td>
                <td>{{$countPekerjaanClosed}}</td>
                <td>{{$countPekerjaanTotal}}</td>
            </tr>
            @endforeach
            <tr class="grandtotal">
                <td colspan="3">Grand Total</td>
                <td>{{$rawData->where('status','Requested')->count()}}</td>
                <td>{{$rawData->where('status','Approved')->count()}}</td>
                <td>{{$rawData->where('status','In Progress')->count()}}</td>
                <td>{{$rawData->where('status','Done')->count()}}</td>
                <td>{{$rawData->where('status','Closed')->count()}}</td>
                <td>{{$rawData->count()}}</td>
            </tr>
        </table>
        @elseif (Auth::user()->role == User)
        <h1>Laporan Permohonan {{Auth::user()->nama}} / {{Auth::user()->nik}}</h1>
        <h2>Periode : {{$awal}} - {{$akhir}}</h2>
        <table>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Klasifikasi Pekerjaan</th>
                <th colspan="5">Kegiatan dalam Angka</th>
                <th rowspan="2">Total</th>
            </tr>
            <tr>
                <th>Requested</th>
                <th>Approved</th>
                <th>In Progres</th>
                <th>Done</th>
                <th>Closed</th>
            </tr>
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
            <tr class="grandtotal">
                <td colspan="3">Grand Total</td>
                <td>{{$rawData->where('status','Requested')->count()}}</td>
                <td>{{$rawData->where('status','Approved')->count()}}</td>
                <td>{{$rawData->where('status','In Progress')->count()}}</td>
                <td>{{$rawData->where('status','Done')->count()}}</td>
                <td>{{$rawData->where('status','Closed')->count()}}</td>
                <td>{{$rawData->count()}}</td>
            </tr>
        </table>
        @endif
    </div>    
</body>
</html>