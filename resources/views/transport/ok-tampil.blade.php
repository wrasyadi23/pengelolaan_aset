<style type="text/css">
    .style1 {color: #0000FF}
    .style2 {color: #000000}
    </style>
    @extends('layouts.master')
    @section('title','Data Order Kerja Transport')
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
                                <h4 class="card-title style1">Data Order kerja Transport</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-primary" onclick="window.location.href='/transport/ok-create'">+ OK Baru</button>
                            </div>
                        </div>
                        <div class="card-content">
                            {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped zero-configuration" style="width: 100%;">
                                    <thead>
                                        <tr class = "table-secondary">
                                            <th><div align="center" class="style6">No</div></th>
                                            <th><div align="center" class="style6">Nomor OK</div></th>
                                            <th><div align="center" class="style6">Tanggal OK</div></th>
                                            <th><div align="center" class="style6">Nomor PR</div></th>
                                            <th><div align="center" class="style6">Tanggal PR</div></th>
                                            <th><div align="center" class="style6">No.Sr</div></th>
                                            <th><div align="center" class="style6">Tanggal SR</div></th>
                                            <th><div align="center" class="style6">Mulai Sewa</div></th>
                                            <th><div align="center" class="style6">Sewa Sampai</div></th>
                                            <th><div align="center" class="style6">Uraian</div></th>
                                            <th><div align="center" class="style6">Rekanan</div></th>
                                            <th><div align="center" class="style6">Jenis Sewa</div></th>
                                            <th><div align="center" class="style6">Aksi</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                       @foreach ($ok as $result => $sp)
                                        <tr>
                                            <td><span class="style7">{{ $result + $ok->firstitem() }}</span></td>
                                            <td><span class="style7">{{ $sp->no_ok }}</span></td>
                                            <td><span class="style7">{{ $sp->tgl }}</span></td>
                                            <td><span class="style7">{{ $sp->getPR->no_pr }}</span></td>
                                            <td><span class="style7">{{ $sp->getPR->tgl }}</span></td>
                                            <td><span class="style7">{{ $sp->getPR->getSR->no_sr }}</span></td>
                                            <td><span class="style7">{{ $sp->getPR->getSR->tgl }}</span></td>
                                            <td><span class="style7">{{ $sp->getPR->getSR->tgl_awal }}</span></td>
                                            <td><span class="style7">{{ $sp->getPR->getSR->tgl_akhir }}</span></td>                         
                                            @if ( $sp->getPR->getSR->getKontrakBA->no_ba == "Sewa-Esidentil")

                                            @php
                                            $tglAwal[$result] = \Carbon\Carbon::parse($sp->tgl_awal);
                                            $tglAkhir[$result] = \Carbon\Carbon::parse($sp->tgl_akhir);
                                            $hari[$result] = $tglAwal[$result]->diffInDays($tglAkhir[$result]) + 1;
                                            @endphp
                                                
                                            <td><div align="left"><span class="style3">Sewa Kendaraan {{ $sp->getPR->getSR->getKontrakBA->getKendaraan->jenis_kend }} {{ $sp->getPR->getSR->getKontrakBA->getKendaraan->merk }}  {{ date('Y', strtotime($sp->getPR->getSR->tgl)) }} - {{$hari[$result]}} {{ $sp->getPR->getSR->getKontrakBA->getKontrak->satuan }}</span></div></td>
                                            @else
                                            <td><div align="left">{{ $sp->getPR->getSR->getKontrakBA->getKontrak->uraian }} {{ $sp->getPR->getSR->getKontrakBA->getKendaraan->merk }} {{ date('Y', strtotime($sp->tgl)) }} - {{ $sp->getPR->getSR->getKontrakBA->getKontrak->jml }} {{ $sp->getPR->getSR->getKontrakBA->getKontrak->satuan }}</div></td>
                                            @endif
                                           
                                            <td><div align="center">{{ $sp->getPR->getSR->getKontrakBA->getKontrak->rekanan }}</div></td>
                                            <td><div align="center">{{ $sp->getPR->getSR->getKontrakBA->getKendaraan->jenis_sewa}}</div></td>
                                          
                                            <th>
                                                <a href="/transport/pr-edit/{{ $sp->id }}" class="badge badge-primary">Edit</a>                                            </th>
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