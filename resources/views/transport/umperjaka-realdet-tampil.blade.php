<style type="text/css">
    .style1 {color: #0000FF}
    .style2 {color: #000000}
    </style>
    @extends('layouts.master')
    @section('title','Data Detail Realisasi')
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
                                <h4 class="card-title style1">Data Detail Realisasi</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-primary" onclick="window.location.href='/transport/umperjaka-realisasi'">+ Baru</button>
                            </div>
                        </div>
                        <div class="card-content">
                            {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped zero-configuration" style="width: 100%;">
                                    <thead>
                                        <tr class = "table-secondary">
                                            <th><div align="center">No</div></th>
                                            <th><div align="center">Tanggal Realisasi</div></th>
                                            <th><div align="center">Uraian</div></th>
                                            <th><div align="center">Harga</div></th>
                                            <th><div align="center">Jumlah</div></th>
                                            <th><div align="center">Satuan</div></th>
                                            <th><div align="center">Total Harga</div></th>
                                            <th><div align="center">Aksi</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                            $total = 0;
                                        @endphp
                                        @foreach ($realdettampil as $result => $rkap)
                                            @php
                                                // $tglAwal[$result] = \Carbon\Carbon::parse($sp->getSR->tgl_awal);
                                                // $tglAkhir[$result] = \Carbon\Carbon::parse($sp->getSR->tgl_akhir);
                                                // $hari[$result] = $tglAwal[$result]->diffInDays($tglAkhir[$result]) + 1;
                                                $subtotal[$result] = $rkap->harga * $rkap->jumlah;
                                                $total = $subtotal[$result] + $total;
                                            @endphp
                                        <tr>
                                            <td><div align="center">{{ $no++ }}</div></td>
                                            <td><div align="center">{{ $rkap->getRealisasiUm->tgl }}</div></td>
                                            <td><div align="left">{{ $rkap->uraian }}</div></td>
                                            <td align="right"><div>{{ number_format($rkap->harga,0)}}</div></td>  
                                            <td align="center"><div>{{ $rkap->jumlah}}</div></td>                
                                            <td><div align="center">{{ $rkap->satuan }}</div></td>
                                            <td align="right"><div>{{number_format($rkap->harga*$rkap->jumlah) }}</div></td>
                                            <th>
                                                <div align="center"><a href="/transport/umperjaka-realdet-edit/{{ $rkap->id }}" class="badge badge-primary">edit</a> </div></th>
                                                
                                            </th>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="6" align="right"><em><strong>Grand Total Harga :</strong></em></td>

                                            <td colspan="1"><div align="center" class="style1">
                                              <div align="right"><em><strong>Rp.{{number_format($total)}}</strong></em></div>
                                            </div></td>

                                        </tr>
                                    </tbody>
                                </table>
                                <div class="general-button">
                                    <button type="button" class="btn btn-primary"
                                            onclick="window.location.href='/transport/umperjaka-real-tampil'">Back
                                    </button>
                          </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection