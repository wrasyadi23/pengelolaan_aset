<style type="text/css">
    .style1 {color: #0066FF}
    </style>
    @extends('layouts.master')
    @section('title','Input Nomor Wum Ptk')
    @section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Input Nomor Wum Ptk</h4>
                        <div class="card-content">
                            <form action="/transport/wum-ptk-store" method="post">
                                @csrf
                                <div class="basic-form">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 style1">
                                            <label for="kd_ptk">Kode Ptk</label>
                                            <select name="kd_ptk" id="kd_ptk" class="form-control input-default">
                                                <option disabled selected></option>
                                                @foreach ($rawDataPtk as $item)
                                                    <option value="{{$item->kd_ptk}}">{{$item->no_ptk}} - {{$item->uraian}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 style1">
                                            <label for="nopol">No Wum</label>
                                            <input type="text" name="no_wum" id="" class="form-control input-default" placeholder="Isi No. Wum" required>
                                        </div>
                                        <div class="form-group col-md-6 style1">
                                            <label for="nopol">Tanggal Wum</label>
                                            <input type="date" name="tgl" id="" class="form-control input-default" placeholder="Tanggal Wum" required>
                                        </div>
                                    </div>
                                    
                                    <div class="general-button">
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='/transport/wum-ptk-index'">Back</button>
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
            $("#kd_ptk").select2({
                placeholder: 'Pilih Nomor Ptk',
                allowClear : true
            });
        </script>
        
    @endsection