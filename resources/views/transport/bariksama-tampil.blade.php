<style type="text/css">
    .style1 {color: #0000FF}
    .style2 {color: #000000}
    </style>
    @extends('layouts.master')
    @section('title','Data BA Riksama Transport')
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
                                <h4 class="card-title style1">Data BA Riksama Transport</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-primary" onclick="window.location.href='/transport/bariksama-create'">+ BA Riksama Baru</button>
                            </div>
                        </div>
                        <div class="card-content">
                            {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped zero-configuration" style="width: 100%;">
                                    <thead>
                                        <tr class = "table-secondary">
                                            <th><div align="center" class="style5">No</div></th>
                                            <th><div align="center" class="style5">No. Riksama</div></th>
                                            <th><div align="center" class="style5">Tgl. Riksama</div></th>
                                            <th><div align="center" class="style5">Nomor OK</div></th>
                                            <th><div align="center" class="style5">Tanggal OK</div></th>
                                            <th><div align="center" class="style5">Nomor PR</div></th>
                                            <th><div align="center" class="style5">Tanggal PR</div></th>
                                            <th><div align="center" class="style5">No.Sr</div></th>
                                            <th><div align="center" class="style5">Tanggal SR</div></th>
                                            <th><div align="center" class="style5">Mulai Sewa</div></th>
                                            <th><div align="center" class="style5">Sewa Sampai</div></th>
                                            <th><div align="center" class="style5">Uraian</div></th>
                                            <th><div align="center" class="style5">Rekanan</div></th>
                                            <th><div align="center" class="style5">Jenis Sewa</div></th>
                                            <th><div align="center" class="style5">Aksi</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                       @foreach ($riksama as $result => $sp)
                                       <tr class="style2">
                                           <td><span class="style3">{{ $result + $riksama->firstitem() }}</span></td>
                                           <td><span class="style3">{{ $sp->no_riksama }}</span></td>
                                           <td><span class="style3">{{ $sp->tgl }}</span></td>
                                           <td><span class="style3">{{ $sp->getOK->no_ok }}</span></td>
                                           <td><span class="style3">{{ $sp->getOK->tgl }}</span></td>
                                           <td><span class="style3">{{ $sp->getOK->getPR->no_pr }}</span></td>
                                           <td><span class="style3">{{ $sp->getOK->getPR->tgl }}</span></td>
                                           <td><span class="style3">{{ $sp->getOK->getPR->getSR->no_sr }}</span></td>
                                           <td><span class="style3">{{ $sp->getOK->getPR->getSR->tgl }}</span></td>
                                           <td><span class="style3">{{ $sp->tgl_awal }}</span></td>
                                           <td><span class="style3">{{ $sp->tgl_akhir }}</span></td>                  
                                            @if ( $sp->getOK->getPR->getSR->getKontrakBA->no_ba == "Sewa-Esidentil")

                                            @php
                                            $tglAwal[$result] = \Carbon\Carbon::parse($sp->tgl_awal);
                                            $tglAkhir[$result] = \Carbon\Carbon::parse($sp->tgl_akhir);
                                            $hari[$result] = $tglAwal[$result]->diffInDays($tglAkhir[$result]) + 1;
                                            @endphp
                                                
                                            <td><div align="left"><span class="style3">Sewa Kendaraan {{ $sp->getOK->getPR->getSR->getKontrakBA->getKendaraan->jenis_kend }} {{ $sp->getOK->getPR->getSR->getKontrakBA->getKendaraan->merk }}  {{ date('Y', strtotime($sp->getOK->getPR->getSR->tgl)) }} - {{$hari[$result]}} {{ $sp->getOK->getPR->getSR->getKontrakBA->getKontrak->satuan }}</span></div></td>
                                            @else
                                            <td><div align="left">{{ $sp->getOK->getPR->getSR->getKontrakBA->getKontrak->uraian }} {{ $sp->getOK->getPR->getSR->getKontrakBA->getKendaraan->merk }} {{ date('Y', strtotime($sp->tgl)) }} - {{ $sp->getOK->getPR->getSR->getKontrakBA->getKontrak->jml }} {{ $sp->getOK->getPR->getSR->getKontrakBA->getKontrak->satuan }}</div></td>
                                            @endif
                                           
                                            <td><div align="center">{{ $sp->getOK->getPR->getSR->getKontrakBA->getKontrak->rekanan }}</div></td>
                                            <td><div align="center">{{ $sp->getOK->getPR->getSR->getKontrakBA->getKendaraan->jenis_sewa}}</div></td>
                                          
                                            <th>
                                                <a href="/transport/bariksama-edit/{{ $sp->id }}" class="badge badge-primary style3">Edit</a>
                                                @if ( $sp->getOK->getPR->getSR->getKontrakBA->no_ba == "Sewa-Esidentil")
                                                <a href="/transport/bariksama-esd-print/{{ $sp->kd_riksama }}" class="badge badge-primary style3">Print</a></th>
                                                @else
                                                <a href="/transport/bariksama-print/{{ $sp->kd_riksama }}" class="badge badge-primary style3">Print</a></th>
                                                @endif
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