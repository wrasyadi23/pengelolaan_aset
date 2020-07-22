<style type="text/css">
.style2 {color: #0033FF}
.style3 {color: #0066FF}
</style>
@extends('layouts.master')
@section('title','Input Pekerjaan')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form SP Sewa Baru</h4>
            <div class="basic-form">
                <form method="post" action="/transport/store">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label><span class="style2">No SP Sewa</span></label>
                            <input type="text" name = "no_sp" class="form-control" placeholder="Sp Sewa Baru">
                        </div>
                      <div class="form-group col-md-6">
                          <label><span class="style3">Cost Center</span></label>
                          <span class="style3">
                            <input type="text" name = "cost_center" class="form-control" placeholder="Cost Center">
                            </span></div>
                        <div class="form-group col-md-6 style3">
                            <label>Gl Account</label>
                            <input type="text" name = "gl_account" class="form-control" placeholder="Gl Account">
                        </div>
                        
                        <div class="form-group col-md-6 style3">
                            <label>Diskrepsi</label>
                            <input type="text" name = "deskripsi" class="form-control" placeholder="Diskrepsi">
                        </div>
                        <div class="form-group col-md-6 style3">
                            <label>Uraian</label>
                            <input type="text" name = "uraian" class="form-control" placeholder="Uraian">
                        </div>
                        <div class="form-group col-md-6 style3">
                            <label>Keterangan</label>
                            <input type="text" name = "keterangan" class="form-control" placeholder="Keterangan">
                        </div>
                        <div class="form-group col-md-6 style3">
                            <label>Tanggal</label>
                            <input type="date" name = "tgl" class="form-control" placeholder="Tanggal Sp">
                        </div>
                        <div class="form-group col-md-6 style3">
                            <label>Jenis Kendaraan</label>
                            <select name = "jenis" class="form-control">
                                <option selected="selected">Pilih Jenis Kendaraan</option>
                                <option value="Sedan">Sedan</option>
                                <option value="Bus">Bus</option>
                                <option value="Station">Station</option>
                                <option value="Spdmtr">Sepaeda Motor</option>
                                <option value="Spdmtrroda3">Sepeda Motor Roda 3</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 style3">
                            <label>Harga</label>
                            <input type="text" name = "harga" class="form-control" placeholder="Harga Sewa Per bulan">
                        </div>
                        <div class="form-group col-md-6 style3">
                            <label>Jumlah</label>
                            <input type="text" name = "jml" class="form-control" placeholder="Jumlah">
                        </div>
                        <div class="form-group col-md-6 style3">
                            <label>Satuan</label>
                            <input type="text" name = "satuan" class="form-control" placeholder="Satuan">
                        </div>
                        <div class="form-group col-md-6 style3">
                            <label>Rekanan</label>
                            <select name = "rekanan" class="form-control">
                                <option selected="selected">Pilih Rekanan</option>
                                <option value="YPG">YPG</option>
                                <option value="GSG">GSG</option>
                                <option value="TRACK">TRACK</option>
                                <option value="K3PG">K3PG</option>
                            </select>
                        </div>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-dark">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection