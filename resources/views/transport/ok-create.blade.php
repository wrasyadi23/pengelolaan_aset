<style type="text/css">
    .style1 {color: #0066FF}
    </style>
    @extends('layouts.master')
    @section('title','Input Order Kerja (OK)')
    @section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Input Order Kerja (OK)</h4>
                        <div class="card-content">
                            <form action="/transport/ok-store" method="post">
                                @csrf
                                <div class="basic-form">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 style1">
                                            <label for="kd_ba">Kode PR</label>
                                            <select name="kd_pr" id="kd_pr" class="form-control input-default">
                                                <option disabled selected></option>
                                                @foreach ($rawDataPR as $item)
                                                    <option value="{{$item->kd_pr}}">{{$item->no_pr}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 style1">
                                            <label for="nopol">No OK</label>
                                            <input type="text" name="no_ok" id="" class="form-control input-default" placeholder="Isi No. OK" required>
                                        </div>
                                        <div class="form-group col-md-6 style1">
                                            <label for="nopol">Tanggal OK</label>
                                            <input type="date" name="tgl" id="" class="form-control input-default" placeholder="Tanggal OK" required>
                                        </div>
                                    </div>
                                    
                                    <div class="general-button">
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='/transport/ok-tampil'">Back</button>
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
            $("#kd_pr").select2({
                placeholder: 'Pilih Nomor PR',
                allowClear : true
            });
        </script>
        
    @endsection