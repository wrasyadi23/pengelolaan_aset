<style type="text/css">
    .style1 {color: #0000FF}
    .style2 {color: #000000}
    </style>
    @extends('layouts.master')
    @section('title','Data SR Detail')
    @section('content')
    <div class="container-fluid mt-3">
        @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title style1">Detail SR Sewa Kendaraan</h4>
                        <div class="card-content">
                            {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                            <div class="table-responsive">
                              <table class="table table-bordered table-striped">
                                <thead>
                                  <tr class = "table-secondary">
                                    <th><div align="center">No</div></th>
                                    <th><div align="center">Nopol</div></th>
                                    <th><div align="center">Merk Kendaraan</div></th>
                                    <th><div align="center">Harga</div></th>
                                    <th><div align="center">Jumlah</div></th>
                                    <th><div align="center">Satuan</div></th>
                                    <th><div align="center">Rekanan</div></th>
                                    = </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                @foreach ($sr as $result => $sp)
                        <tr>
                            <td>{{ $result + $sr->firstitem() }}</td>
                            <td>{{ $sp->nopol }}</td>
                            <td>{{ $sp->merk }}</td>
                            <td><div align="right" class="style2">{{ number_format($sp->harga,0) }}</div></td>
                            <td><div align="center">{{ $sp->jml }}</div></td>
                            <td><div align="center"><span class="style2">{{ $sp->satuan }}</span></div></td>
                            <td><div align="center">{{ $sp->rekanan }}</div></td>
                        </tr>
                                                        @endforeach
                        <tr>
                            <td colspan="6" align="right"><strong>Total Harga Sewea :</strong></td>
                            <td align="left"><strong>Rp. {{ number_format($sp->ttl_hrg,0) }}</strong></td>
                            
                        </tr>
                              </table>
                              <div class="general-button">
                                             <button type="button" class="btn btn-success" onclick="window.location.href='/transport/sewa-sr-tampil'">Back</button>
                              </div>
                          </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection