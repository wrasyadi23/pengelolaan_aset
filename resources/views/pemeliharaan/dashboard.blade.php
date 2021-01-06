@extends('layouts.master')
@section('title','Home')
@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Requested Jobs</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{$pekerjaan->where('status','Requested')->count()}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-database"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Approved Jobs</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{$pekerjaan->where('status','Approved')->count()}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-database"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">In Progres</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{$pekerjaan->where('status','In Progress')->count()}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-database"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Closed Jobs</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{$pekerjaan->where('status','Closed')->count()}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-database"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div id="chart-status" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div id="chart-jenis-pekerjaan" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        Highcharts.chart('chart-status', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Jumlah Pekerjaan Berdasarkan Progess'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b> {point.y}'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Status Pekerjaan',
                colorByPoint: true,
                data: [{
                    name: 'Requested',
                    y: {{$pekerjaan->where('status','Requested')->count()}},
                    color: '#7571f9'
                }, {
                    name: 'Approved',
                    y: {{$pekerjaan->where('status','Approved')->count()}},
                    color: '#e83e8c'
                }, {
                    name: 'In Progress',
                    y: {{$pekerjaan->where('status','In Progress')->count()}},
                    color: '#ec0c38'
                }, {
                    name: 'Done',
                    y: {{$pekerjaan->where('status','Done')->count()}},
                    color: '#2dce89'
                }, {
                    name: 'Closed',
                    y: {{$pekerjaan->where('status','Closed')->count()}},
                    color: '#f29d56'
                }]
            }]
        });

        Highcharts.chart('chart-jenis-pekerjaan', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Jumlah Pekerjaan Berdasarkan Klasifikasi'
            },
            xAxis: {
                categories: {!! $pekerjaanKlasifikasi->pluck('klasifikasi_pekerjaan') !!},
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Pekerjaan'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Jumlah Pekerjaan',
                data: {!! $pekerjaanKlasifikasi->pluck('total_pekerjaan') !!}
            }]
        })
    </script>
@endsection
