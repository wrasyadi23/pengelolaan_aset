<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pekerjaan</title>
</head>
<body>
<table>
    {{-- header  --}}
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
    {{-- content  --}}
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
</table>
</body>
</html>
