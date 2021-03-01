<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan</title>
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
        <h1>Laporan Pekerjaan {{auth()->getKaryawan->getBagian->bagian}}</h1>
        <tabel>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Klasifikasi Pekerjaan</th>
                <th colspan="7">Jumlah</th>
            </tr>
            <tr>
                <th>Revisi</th>
                <th>Requested</th>
                <th>Approved</th>
                <th>In Progress</th>
                <th>Done</th>
                <th>Closed</th>
                <th>Canceled</th>
            </tr>
            @php
                $no = 1;
            @endphp
            @foreach ($pekerjaan as $key => $itempekerjaan)    
            <tr>
                <td>{{$no++}}</td>
                <td>{{$itempekerjaan->first()->getKlasifikasi->klasifikasi_pekerjaan}}</td>
                <td>{{$itempekerjaan->where('status', 'Revisi')->count()}}</td>
                <td>{{$itempekerjaan->where('status', 'Requested')->count()}}</td>
                <td>{{$itempekerjaan->where('status', 'Approved')->count()}}</td>
                <td>{{$itempekerjaan->where('status', 'In Progress')->count()}}</td>
                <td>{{$itempekerjaan->where('status', 'Done')->count()}}</td>
                <td>{{$itempekerjaan->where('status', 'Closed')->count()}}</td>
                <td>{{$itempekerjaan->where('status', 'Canceled')->count()}}</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="2">Grand Total</th>
                <th>{{$pekerjaan->where('status', 'Revisi')->count()}}</th>
                <th>{{$pekerjaan->where('status', 'Requested')->count()}}</th>
                <th>{{$pekerjaan->where('status', 'Approved')->count()}}</th>
                <th>{{$pekerjaan->where('status', 'In Progress')->count()}}</th>
                <th>{{$pekerjaan->where('status', 'Done')->count()}}</th>
                <th>{{$pekerjaan->where('status', 'Closed')->count()}}</th>
                <th>{{$pekerjaan->where('status', 'Canceled')->count()}}</th>
            </tr>
        </tabel>
    </div>
</body>
</html>