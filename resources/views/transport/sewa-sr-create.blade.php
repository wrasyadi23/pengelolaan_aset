<style type="text/css">
    .style1 {color: #0066FF}
    </style>
    @extends('layouts.master')
    @section('title','Input Service Request')
    @section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Input Service Request</h4>
                        <div class="card-content">
                            <form action="/transport/store" method="post">
                                @csrf
                                <div class="basic-form">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 style1">
                                            <label for="kd_ba">Kode BA</label>
                                            <select name="kd_ba" id="kd_ba" class="form-control input-default">
                                                <option disabled selected></option>
                                                @foreach ($rawDataBA as $item)
                                                    <option value="{{$item->kd_ba}}">{{$item->no_ba}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                      
                                        <div class="form-group col-md-4 style1">
                                            <label for="nopol">Tanggal Sr</label>
                                            <input type="date" name="tgl" id="" class="form-control input-default" placeholder="Tanggal Sr" required>
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="merk">Tanggal Awal</label>
                                            <input type="date" name="tgl_awal" id="" class="form-control input-default" placeholder="Tanggal Awal Sr" required>
                                        </div>
                                        <div class="form-group col-md-4 style1">
                                            <label for="type">Tangal Akhir</label>
                                            <input type="date" name="tgl_akhir" id="" class="form-control input-default" placeholder="Tangal Akhir Sr " required>
                                        </div>
                                    </div>
                                    
                                    <div class="general-button">
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='/transport/sewa-sr-tampil'">Back</button>
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