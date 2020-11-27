<style type="text/css">
    .style1 {color: #0000FF}
    .style2 {color: #000000}
    </style>
    @extends('layouts.master')
    @section('title','Data Service Request Transport')
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
                                <h4 class="card-title style1">Data Service Request Transport</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-primary" onclick="window.location.href='/transport/pr-create'">+ PR Baru</button>
                            </div>
                        </div>
                        <div class="card-content">
                            {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped zero-configuration" style="width: 100%;">
                                    <thead>
                                        <tr class = "table-secondary">
                                            <th><div align="center">No</div></th>
                                            <th><div align="center">Nomor PR</div></th>
                                            <th><div align="center">Tanggal PR</div></th>
                                            <th><div align="center">No.Sr</div></th>
                                            <th><div align="center">Tanggal SR</div></th>
                                            <th><div align="center">Mulai Sewa</div></th>
                                            <th><div align="center">Sewa Sampai</div></th>
                                            <th><div align="center">Uraian</div></th>
                                            <th><div align="center">Rekanan</div></th>
                                            <th><div align="center">Jenis Sewa</div></th>
                                            <th><div align="center">Aksi</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($pr as $result => $r)
                                        <tr>
                                            <td><div align="center">{{ $result + $pr->firstitem() }}</div></td>
                                            <td><div align="center">{{ $r->no_pr }}</div></td>
                                            <td><div align="center">{{ $r->tgl }}</div></td>
                                            <td><div align="center">{{ $r->getSR->no_sr }}</div></td>
                                            <td><div align="center">{{ $r->getSR->tgl }}</div></td>
                                            <td><div align="center">{{ $r->getSR->tgl_awal }}</div></td>
                                            <td><div align="center">{{ $r->getSR->tgl_akhir }}</div></td>                                    
                                            @if ( $r->getSR->getKontrakBA->no_ba == "Sewa-Esidentil")

                                            @php
                                            $tglAwal[$result] = \Carbon\Carbon::parse($r->tgl_awal);
                                            $tglAkhir[$result] = \Carbon\Carbon::parse($r->tgl_akhir);
                                            $hari[$result] = $tglAwal[$result]->diffInDays($tglAkhir[$result]) + 1;
                                            @endphp
                                                
                                            <td><div align="left"><span class="style3">Sewa Kendaraan {{ $r->getSR->getKontrakBA->getKendaraan->jenis_kend }} {{ $r->getSR->getKontrakBA->getKendaraan->merk }}  {{ date('Y', strtotime($r->getSR->tgl)) }} - {{$hari[$result]}} {{ $r->getSR->getKontrakBA->getKontrak->satuan }}</span></div></td>
                                            @else
                                            <td><div align="left">{{ $r->getSR->getKontrakBA->getKontrak->uraian }} {{ $r->getSR->getKontrakBA->getKendaraan->merk }} {{ date('Y', strtotime($r->tgl)) }} - {{ $r->getSR->getKontrakBA->getKontrak->jml }} {{ $r->getSR->getKontrakBA->getKontrak->satuan }}</div></td>
                                            @endif
                                           
                                            <td><div align="center">{{ $r->getSR->getKontrakBA->getKontrak->rekanan }}</div></td>
                                            <td><div align="center">{{ $r->getSR->getKontrakBA->getKendaraan->jenis_sewa}}</div></td>
                                          
                                            <th>
                                                <a href="/transport/pr-edit/{{ $r->id }}" class="badge badge-primary">Edit</a>                                            
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