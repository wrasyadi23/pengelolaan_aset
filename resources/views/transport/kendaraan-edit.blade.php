<style type="text/css">
    .style1 {color: #0066FF}
    </style>
    @extends('layouts.master')
    @section('title','Edit Master Kendaraan')
    @section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Master Kendaraan</h4>
                        <div class="card-content">
                            <form action="/transport/kendaraan-edit/{{ $editkend->id}}" method="post">
                                @csrf
                                <div class="basic-form">
                                    <div class="form-row">
                                      
                                        <div class="form-group col-md-4 style1">
                                            <label for="nopol">Nopol</label>
                                            <input type="text" name="nopol" id="" class="form-control input-default" placeholder="Nopol" required value="{{ $editkend->nopol }}">
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="merk">Merk Kendaraan</label>
                                            <input type="text" name="merk" id="" class="form-control input-default" placeholder="Merk Kendaraan" required value="{{ $editkend->merk }}">
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="type">Type Kendaraan</label>
                                            <input type="text" name="type" id="" class="form-control input-default" placeholder="Type Kendaraan" required value="{{ $editkend->type }}">
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="tahun">Tahun Pembuatan</label>
                                            <input type="year" name="tahun" id="" class="form-control input-default" placeholder="Tahun Pembuatan" required value="{{ $editkend->tahun }}">
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="warna">Warna</label>
                                            <input type="text" name="warna" id="" class="form-control input-default" placeholder="Warna" required value="{{ $editkend->warna }}">
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="jenis">Jenis Kendaraan</label>
                                            <select name = "jenis" class="form-control">
                                                <option value="{{ $editkend->jenis }}">{{ $editkend->jenis }}</option>
                                                <option value="Sedan">Sedan</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Station">Station</option>
                                                <option value="PickUp">PickUp</option>
                                                <option value="Spdmtr">Sepeda Motor</option>
                                                <option value="Spdmtrroda3">Sepeda Motor Roda 3</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="jenis_bbm">Jenis BBM</label>
                                            <select name = "jenis_bbm" class="form-control">
                                                <option value="{{ $editkend->jenis_bbm }}">{{ $editkend->jenis_bbm }}</option>
                                                <option value="PetraMax">PetraMax</option>
                                                <option value="Pertalite">Pertalite</option>
                                                <option value="PeraminaDex">PertaminaDex</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="jata_bbm">Jata BBM</label>
                                            <input type="decimal" name="jml_bbm" id="" class="form-control input-default" placeholder="Jata BBM" required value="{{ $editkend->jml_bbm }}">
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="no_mesin">No Mesin</label>
                                            <input type="text" name="no_mesin" id="" class="form-control input-default" placeholder="No Mesin" required value="{{ $editkend->no_mesin }}">
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="no_rangka">No. Rangka</label>
                                            <input type="text" name="no_rangka" id="" class="form-control input-default" placeholder="No. Rangka" required value="{{ $editkend->no_rangka }}">
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="no_rangka">Kode Departemen</label>
                                            <input type="text" name="kd_departemen" id="" class="form-control input-default" placeholder="No. Rangka" required value="{{ $editkend->kd_departemen }}">
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="jata_bbm">Kode Bagian</label>
                                            <input type="decimal" name="kd_bagian" id="" class="form-control input-default" placeholder="Jata BBM" required value="{{ $editkend->kd_bagian }}">
                                        </div>
                                        <div class="form-group col-md-12 style1">
                                            <label for="jata_bbm">Status</label>
                                            <input type="decimal" name="status" id="" class="form-control input-default" placeholder="Jata BBM" required value="{{ $editkend->status }}">
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="general-button">
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='/transport/kendaraan-tampil'">Back</button>
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

    @section('script')
    <script>
        $("#kd_ba").select2({
            placeholder: 'Pilih Nomor BA',
            allowClear : true
        });
    </script>
    
@endsection