<style type="text/css">
    .style1 {color: #0000FF}
</style>
    @extends('layouts.master')
    @section('title','Data Service Request Sewa Esidentil Detail')
    @section('content')
    <div class="container-fluid mt-3">
        @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title style1">Data Service Request Sewa Esidentil Detail</h4>
                        <div class="card-content">
                            {{-- Tampilan detail table, uncomment dari bawah untuk pakai --}}
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped zero-configuration" style="width: 100%;">
                                    <thead>
                                        <tr class = "table-secondary">
                                            <th><div align="center">No</div></th>
                                            <th><div align="center">Kode.Sr</div></th>
                                            <th><div align="center">No.Sr</div></th>
                                            <th><div align="center">Nopol</div></th>
                                            <th><div align="center">Merk</div></th>
                                            <th><div align="center">Tahun</div></th>
                                            <th><div align="center">Tanggal</div></th>
                                            <th><div align="center">Mulai</div></th>
                                            <th><div align="center">Sampai</div></th>
                                            <th><div align="center">Dipergunakan</div></th>
                                            <th><div align="center">Harga/Hari</div></th>
                                            

                                            <th><div align="center">Lama Sewa</div></th>

                                            <th><div align="center">Subtotal</div></th>

                                            <th><div align="center">Aksi</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                            $total = 0;
                                        @endphp
                                        @foreach ($sresd as $result => $esd)
                                            @php
                                                $tglAwal[$result] = \Carbon\Carbon::parse($esd->getSR->tgl_awal);
                                                $tglAkhir[$result] = \Carbon\Carbon::parse($esd->getSR->tgl_akhir);
                                                $hari[$result] = $tglAwal[$result]->diffInDays($tglAkhir[$result]) + 1;
                                                $subtotal[$result] = $esd->getTarif->harga * $hari[$result];
                                                $jmlKendaraan[$result] = $esd->where('kd_sr', $esd->kd_sr)->count('kd_kendaraan') - 1;
                                                $total = $subtotal[$result] + $total;
                                            @endphp
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $esd->kd_sr }}</td>
                                            <td>{{ $esd->getSR->no_sr }}</td>
                                            <td>{{ $esd->getKendaraan->nopol }}</td>
                                            <td>{{ $esd->getKendaraan->merk }}</td>
                                            <td>{{ $esd->getKendaraan->tahun }}</td>
                                            <td>{{ $esd->getSR->tgl }}</td>
                                            <td>{{ $esd->getSR->tgl_awal }}</td>
                                            <td>{{ $esd->getSR->tgl_akhir }}</td>
                                            <td>{{ $esd->getKendaraan->warna }}</td>
                                            <td><div align="right"><span class="style1">{{ number_format($esd->getTarif->harga,0) }}</span></div></td>

											<td><div align="center">{{ $tglAkhir[$result]->diffInDays($tglAwal[$result])+1 }} Hari</div></td>
                                            <td>{{ number_format($subtotal[$result]) }}</td>


                                            <th>
                                                <a href="/transport/sr-esd-edit/{{ $esd->id }}" class="badge badge-primary">Edit</a>
                                            </th>
                                        </tr>

                                        @endforeach
                                        <tr>
                                            <td colspan="10" align="right"><em><strong>Total Harga</strong></em></td>

                                            <td colspan="4"><div align="center" class="style1"><em><strong>Rp.{{number_format($total)}}</strong></em></div></td>

                                        </tr>
                                    </tbody>
                                </table>
                                <div class="general-button">
                                        <button type="button" class="btn btn-primary"
                                                onclick="window.location.href='/transport/sr-tampil'">Back
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
