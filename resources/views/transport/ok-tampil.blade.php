<style type="text/css">
    .style1 {color: #0000FF}
    .style2 {color: #000000}
    .style3 {font-size: 12px}
.style5 {font-size: 12px; color: #0000CC; }
</style>
    @extends('layouts.master')
    @section('title','Data SR, PR, OK Sewa Kendaraan')
    @section('content')
    <div class="container-fluid mt-3">
        @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title style1">Data SR, PR, OK Sewa Kendaraan</h4>
                        <form action="/transport/cari" method="get">
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <input type="text" name="key" id="" class="form-control" placeholder="Panggil Order Kerja (No.OK)">
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                    <button type="reset" class="btn btn-primary" onclick="window.location.href='/transport/ok-tampil'">Reset</button>
                                    <a href="/transport/ok-create" class="btn btn-success">OK Baru</a>
                                </div> 
                        </form>
                        <div class="card-content">
                            {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class = "style2">
                                            <th><div align="center" class="style5">No</div></th>
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
                                            <th><div align="center" class="style5">Aksi</div></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ok as $result => $sp)
                                        <tr class="style2">
                                            <td><span class="style3">{{ $result + $ok->firstitem() }}</span></td>
                                            <td><span class="style3">{{ $sp->no_ok }}</span></td>
                                            <td><span class="style3">{{ $sp->tgl }}</span></td>
                                            <td><span class="style3">{{ $sp->getPR->no_pr }}</span></td>
                                            <td><span class="style3">{{ $sp->getPR->tgl }}</span></td>
                                            <td><span class="style3">{{ $sp->getPR->getSR->no_sr }}</span></td>
                                            <td><span class="style3">{{ $sp->getPR->getSR->tgl }}</span></td>
                                            <td><span class="style3">{{ $sp->getPR->getSR->tgl_awal }}</span></td>
                                            <td><span class="style3">{{ $sp->getPR->getSR->tgl_akhir }}</span></td>
                                            <td><span class="style3">{{ $sp->getPR->getSR->getKontrakBA->getKontrak->uraian }}-{{ $sp->getPR->getSR->getKontrakBA->getKontrak->jml }}-{{ $sp->getPR->getSR->getKontrakBA->getKontrak->satuan }}</span></td>
                                            <td><span class="style3">{{ $sp->getPR->getSR->getKontrakBA->getKontrak->rekanan }}</span></td>
                                            <th>
                                                <a href="/transport/ok-edit/{{ $sp->id }}" class="badge badge-primary style3">Edit</a>                                            </th>
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