<style type="text/css">
    .style1 {color: #0066FF}
    </style>
    @extends('layouts.master')
    @section('title','Input Nomor Clearing')
    @section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Input Nomor Clearing</h4>
                        <div class="card-content">
                            <form action="/transport/clearing-store" method="post">
                                @csrf
                                <div class="basic-form">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 style1">
                                            <label for="kd_uangmuka">Kode Wum Sap</label>
                                            <select name="kd_wum" id="kd_wum" class="form-control input-default">
                                                <option disabled selected></option>
                                                @foreach ($rawDataWum as $item)
                                                    <option value="{{$item->kd_wum}}">{{$item->no_wum}} - {{$item->getUangmuka->uraian}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 style1">
                                            <label for="nopol">No Clearing</label>
                                            <input type="text" name="no_clearing" id="" class="form-control input-default" placeholder="Isi No. Clearing Sap" required>
                                        </div>
                                        <div class="form-group col-md-6 style1">
                                            <label for="nopol">Tanggal Clearing</label>
                                            <input type="date" name="tgl" id="" class="form-control input-default" placeholder="Tanggal Wum" required>
                                        </div>
                                    </div>
                                    
                                    <div class="general-button">
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='/transport/clearing-tampil'">Back</button>
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
            $("#kd_wum").select2({
                placeholder: 'Pilih Nomor Wum Sap',
                allowClear : true
            });
        </script>
        
    @endsection