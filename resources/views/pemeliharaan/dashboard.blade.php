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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Selamat Datang</h4>
                    <div class="card-content">
                        <div class="alert alert-success">Ini adalah menu dashboard pemeliharaan.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bar Chart</h4>
                    <div id="morris-bar-chart" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                        <svg height="342" version="1.1" width="787" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.95px; top: -0.225px;">
                            <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc>
                            <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                            <text x="32.53125" y="303.375" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                <tspan dy="4.3984375" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan>
                            </text>
                            <path fill="none" stroke="#000000" d="M45.03125,303.375H761.9" stroke-opacity="0" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                            <text x="32.53125" y="233.78125" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                <tspan dy="4.3984375" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">25</tspan>
                            </text>
                            <path fill="none" stroke="#000000" d="M45.03125,233.78125H761.9" stroke-opacity="0" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                            <text x="32.53125" y="164.1875" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                <tspan dy="4.3984375" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">50</tspan>
                            </text>
                            <path fill="none" stroke="#000000" d="M45.03125,164.1875H761.9" stroke-opacity="0" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                            <text x="32.53125" y="94.59375" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                <tspan dy="4.3984375" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">75</tspan>
                            </text>
                            <path fill="none" stroke="#000000" d="M45.03125,94.59375H761.9" stroke-opacity="0" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                            <text x="32.53125" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                <tspan dy="4.3984375" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">100</tspan>
                            </text>
                            <path fill="none" stroke="#000000" d="M45.03125,25H761.9" stroke-opacity="0" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                            <text x="710.6950892857142" y="315.875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.8125)">
                                <tspan dy="4.3984375" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan>
                            </text>
                            <text x="608.2852678571428" y="315.875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.8125)">
                                <tspan dy="4.3984375" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011</tspan>
                            </text
                            ><text x="505.87544642857137" y="315.875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.8125)">
                                <tspan dy="4.3984375" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2010</tspan>
                            </text>
                            <text x="403.465625" y="315.875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.8125)">
                                <tspan dy="4.3984375" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2009</tspan>
                            </text>
                            <text x="301.05580357142856" y="315.875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.8125)">
                                <tspan dy="4.3984375" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2008</tspan>
                            </text>
                            <text x="198.64598214285712" y="315.875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.8125)">
                                <tspan dy="4.3984375" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2007</tspan>
                            </text>
                            <text x="96.23616071428572" y="315.875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.8125)">
                                <tspan dy="4.3984375" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2006</tspan>
                            </text>
                            <rect x="57.83247767857143" y="25" width="23.602455357142855" height="278.375" rx="0" ry="0" fill="#7571f9" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="84.43493303571428" y="52.837500000000006" width="23.602455357142855" height="250.5375" rx="0" ry="0" fill="#9097c4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="111.03738839285714" y="136.35" width="23.602455357142855" height="167.025" rx="0" ry="0" fill="#4d7cff" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="160.24229910714286" y="94.59375" width="23.602455357142855" height="208.78125" rx="0" ry="0" fill="#7571f9" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="186.8447544642857" y="122.43125" width="23.602455357142855" height="180.94375" rx="0" ry="0" fill="#9097c4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="213.44720982142857" y="192.025" width="23.602455357142855" height="111.35" rx="0" ry="0" fill="#4d7cff" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="262.6521205357143" y="164.1875" width="23.602455357142855" height="139.1875" rx="0" ry="0" fill="#7571f9" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="289.25457589285713" y="192.025" width="23.602455357142855" height="111.35" rx="0" ry="0" fill="#9097c4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="315.85703125" y="219.8625" width="23.602455357142855" height="83.51249999999999" rx="0" ry="0" fill="#4d7cff" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="365.06194196428567" y="94.59375" width="23.602455357142855" height="208.78125" rx="0" ry="0" fill="#7571f9" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="391.6643973214285" y="122.43125" width="23.602455357142855" height="180.94375" rx="0" ry="0" fill="#9097c4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="418.26685267857135" y="192.025" width="23.602455357142855" height="111.35" rx="0" ry="0" fill="#4d7cff" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="467.4717633928571" y="164.1875" width="23.602455357142855" height="139.1875" rx="0" ry="0" fill="#7571f9" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="494.07421874999994" y="192.025" width="23.602455357142855" height="111.35" rx="0" ry="0" fill="#9097c4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="520.6766741071428" y="219.8625" width="23.602455357142855" height="83.51249999999999" rx="0" ry="0" fill="#4d7cff" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="569.8815848214285" y="94.59375" width="23.602455357142855" height="208.78125" rx="0" ry="0" fill="#7571f9" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="596.4840401785714" y="122.43125" width="23.602455357142855" height="180.94375" rx="0" ry="0" fill="#9097c4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="623.0864955357142" y="192.025" width="23.602455357142855" height="111.35" rx="0" ry="0" fill="#4d7cff" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="672.2914062499999" y="25" width="23.602455357142855" height="278.375" rx="0" ry="0" fill="#7571f9" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="698.8938616071428" y="52.837500000000006" width="23.602455357142855" height="250.5375" rx="0" ry="0" fill="#9097c4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                            <rect x="725.4963169642856" y="192.025" width="23.602455357142855" height="111.35" rx="0" ry="0" fill="#4d7cff" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                        </svg>
                        <div class="morris-hover morris-default-style" style="left: 362.609px; top: 117px; display: none;">
                            <div class="morris-hover-row-label">2009</div>
                            <div class="morris-hover-point" style="color: #7571F9">
                            A:
                            75
                            </div>
                            <div class="morris-hover-point" style="color: #9097c4">
                            B:
                            65
                            </div>
                            <div class="morris-hover-point" style="color: #4d7cff">
                            C:
                            40
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div> --}}
</div>
@endsection