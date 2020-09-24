<style type="text/css">
    .style1 {color: #0066FF}
    </style>
    @extends('layouts.master')
    @section('title','Input Sp Sewa')
    @section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Input Sp Sewa</h4>
                        <div class="card-content">
                            <form action="/transport/sewa-sp-store" method="post">
                                @csrf
                                <div class="basic-form">
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                          <label for="bagian"><span class="style1">No.Sp Sewa</span></label>
                                          <span class="style1">
                                            <input type="text" name="no_sp" id="" class="form-control input-default" placeholder="Sp Sewa Baru" required>
                                            </span></div>
                                        <div class="form-group col-md-6 style1">
                                            <label for="seksi">Cost Center</label>
                                            <input type="text" name="cost_center" id="" class="form-control input-default" placeholder="Cost Center" required>
                                        </div>
                                        <div class="form-group col-md-6 style1">
                                            <label for="regu">Gl Account</label>
                                            <input type="text" name="gl_acc" id="" class="form-control input-default" placeholder="Gl Account" required>
                                        </div>
                                        <div class="form-group col-md-6 style1">
                                            <label for="regu">Merk Kendaraan</label>
                                            <input type="text" name="deskripsi" id="" class="form-control input-default" placeholder="Merk Kendaraan" required>
                                        </div>
                                        <div class="form-group col-md-6 style1">
                                            <label for="regu">Uraian</label>
                                            <input type="text" name="uraian" id="" class="form-control input-default" placeholder="uraian" required>
                                        </div>
                                        <div class="form-group col-md-6 style1">
                                            <label for="regu">Alasan</label>
                                            <input type="text" name="keterangan" id="" class="form-control input-default" placeholder="Alasan" required>
                                        </div>
                                        <div class="form-group col-md-6 style1">
                                            <label for="regu">Tanggal</label>
                                            <input type="date" name="tgl" id="" class="form-control input-default" placeholder="Tanggal SP" required>
                                        </div>
                                        <div class="form-group col-md-6 style1">
                                            <label for="regu">Jenis Sewa</label>
                                            <select name = "jenis" class="form-control">
                                                <option selected="selected">Pilih Jenis Sewa</option>
                                                <option value="SP">SP</option>
                                                <option value="ESD">ESD</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 style1">
                                            <label for="regu">Harga</label>
                                            <input type="text" name="harga" id="" class="form-control input-default" placeholder="Harga" required>
                                        </div>
                                        <div class="form-group col-md-6 style1">
                                            <label for="regu">Jumlah</label>
                                            <input type="text" name="jml" id="" class="form-control input-default" placeholder="Jumlah" required>
                                        </div>
                                        <div class="form-group col-md-6 style1">
                                            <label for="regu">Satuan</label>
                                            <input type="text" name="satuan" id="" class="form-control input-default" placeholder="Satuan" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <span class="style1">
                                            <label for="regu">Rekanan</label>
                                            </span>
                                            <label for="regu"></label>
                                            <select name = "rekanan" class="form-control">
                                                <option selected="selected">Pilih Rekanan</option>
                                                <option value="YPG">YPG</option>
                                                <option value="GSG">GSG</option>
                                                <option value="TRACK">TRACK</option>
                                                <option value="K3PG">K3PG</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="general-button">
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='/transport/sewa-sp-tampil'">Back</button>
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
    @endsection