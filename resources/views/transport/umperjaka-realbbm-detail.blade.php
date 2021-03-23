<style type="text/css">
    .style1 {color: #0066FF}
    .style2 {color: #0000FF}
</style>
    @extends('layouts.master')
    @section('title','Realisasi Bbm Detail')
    @section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Realisasi Bbm Detail</h4>
                        <div class="card-content">
                            <form action="/transport/umperjaka-realbbm-detail-store" method="post">
                                @csrf
                                <div class="basic-form">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 style1">
                                            <label for="kd_real_um">Kode Realisasi Um</label>
                                            <input type="text" name="kd_real_um" id="" class="form-control input-default"value="{{ $getRealUm->first()->kd_real_um}}">
                                        </div>   
                                    </div>
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                          <label for="uraian"><span class="style2">Uraian</span></label>
                                          <span class="style2">
                                            <input type="text" name="uraian" id="" class="form-control input-default" placeholder="Uraian Realisasi" required>
                                            </span></div>
                                        <div class="form-group col-md-6 style2">
                                            <label for="harga">Harga</label>
                                            <input type="text" name="harga" id="" class="form-control input-default" placeholder="Harga" required>
                                        </div>
                                    </div>
                                    <div class="form-row style2">
                                        <div class="form-group col-md-6">
                                            <label for="jumlah">Jumlah</label>
                                            <input type="text" name="jumlah" id="" class="form-control input-default" placeholder="Jumlah" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="satuan">Satuan</label>
                                            <input type="text" name="satuan" id="" class="form-control input-default" placeholder="Satuan" required>
                                        </div>
                                    </div>
                                    
                                    <div class="general-button">
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='/transport/umperjaka-real-tampil'">Back</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Realisasi UmPerjaka Detail</h4>
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table-striped table-bordered zero-configuration table"
                           style="width: 100%">
                        <thead>
                        <tr>
                            <td>No</td>
                            <td>Uraian</td>
                            <td>Harga</td>
                            <td>Jumlah</td>
                            <td> Total Harga</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- @forelse($realdet as $index => $realdet)
                            <tr>
                                <td>{{$index +1}}</td>
                                <td>{{$kendaraanPivot->uraian}}</td> --}}
                                {{-- <td>{{$kendaraanPivot->getKendaraan->merk}}</td>
                                <td>{{$kendaraanPivot->getKendaraan->type}}</td> --}}
                                {{-- <td>{{$kendaraanPivot->getTarif->harga}}</td> --}}
                                {{-- <td>{{ number_format($kendaraanPivot->getTarif->harga,0) }}</td>
                            </tr>
                        {{-- @empty
                            <tr>
                                <td colspan="6" align="center">Belum ada data kendaraan</td>
                            </tr>
                        @endforelse --}} --}}
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
   

   