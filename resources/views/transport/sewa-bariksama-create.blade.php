<style type="text/css">
    .style1 {color: #0066FF}
    </style>
    @extends('layouts.master')
    @section('title','Input BA Riksama')
    @section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Input BA Riksama</h4>
                        <div class="card-content">
                            <form action="/transport/sewa-bariksama-store" method="post">
                                @csrf
                                <div class="basic-form">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 style1">
                                            <label for="kd_ba">Kode PR</label>
                                            <select name="kd_ok" id="kd_ok" class="form-control input-default">
                                                <option disabled selected></option>
                                                @foreach ($rawDataRiksama as $item)
                                                    <option value="{{$item->kd_ok}}">{{$item->no_ok}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12 style1">
                                            <label for="nopol">Tanggal Riksama</label>
                                            <input type="date" name="tgl" id="" class="form-control input-default" placeholder="Tanggal OK" required>
                                        </div>
                                        <div class="form-group col-md-6 style1">
                                            <label for="nopol">Tanggal Awal Riksama</label>
                                            <input type="date" name="tgl_awal" id="" class="form-control input-default" placeholder="Tanggal Awal" required>
                                        </div>
                                        <div class="form-group col-md-6 style1">
                                            <label for="nopol">Tanggal Akhir Riksama</label>
                                            <input type="date" name="tgl_akhir" id="" class="form-control input-default" placeholder="Tanggal Akhir" required>
                                        </div>
                                        <div class="form-group col-md-12 style1">
                                            <label for="nopol">Periode</label>
                                            <input type="text" name="periode" id="" class="form-control input-default" placeholder="Pembayaran ke..." required>
                                        </div>
                                    </div>
                                    
                                    <div class="general-button">
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='/transport/sewa-bariksama-tampil'">Back</button>
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
            $("#kd_ok").select2({
                placeholder: 'Pilih Nomor OK',
                allowClear : true
            });
        </script>
        
    @endsection