<style type="text/css">
    .style1 {color: #0000FF}
    .style2 {color: #000000}
    </style>
    @extends('layouts.master')
    @section('title','Data SR, PR Sewa Kendaraan')
    @section('content')
    <div class="container-fluid mt-3">
        @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title style1">Data SR, PR Sewa Kendaraan</h4>
                        <form action="/transport/pr-cari" method="get">
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <input type="text" name="key" id="" class="form-control" placeholder="Panggil Purchase Request (No.PR)">
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                    <button type="reset" class="btn btn-primary" onclick="window.location.href='/transport/pr-tampil'">Reset</button>
                                    <a href="/transport/pr-create" class="btn btn-success">PR Baru</a>
                                </div> 
                        </form>
                        <div class="card-content">
                            {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
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
                                            <th><div align="center">Aksi</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pr as $result => $sp)
                                        <tr>
                                            <td>{{ $result + $pr->firstitem() }}</td>
                                            <td>{{ $sp->no_pr }}</td>
                                            <td>{{ $sp->tgl }}</td>
                                            <td>{{ $sp->getSR->no_sr }}</td>
                                            <td>{{ $sp->getSR->tgl }}</td>
                                            <td>{{ $sp->getSR->tgl_awal }}</td>
                                            <td>{{ $sp->getSR->tgl_akhir }}</td>                                    
                                            <td>{{ $sp->getSR->getKontrakBA->getKontrak->uraian }}</td>
                                            <td>{{ $sp->getSR->getKontrakBA->getKontrak->rekanan }}</td>
                                            <th>
                                                <a href="/transport/pr-edit/{{ $sp->id }}" class="badge badge-primary">Edit</a>
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