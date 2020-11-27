<style type="text/css">
    .style1 {color: #0066FF}
    </style>
    @extends('layouts.master')
    @section('title','Edit RKAP')
    @section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit R K A P</h4>
                        <div class="card-content">
                            <form action="/transport/rkap-update/{{ $editrkap->id}}" method="post">
                                @csrf
                                <div class="basic-form">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 style1">
                                            <label for="kd_ba">Cost Center</label>
                                            <input type="text" name="cost_center" id="" class="form-control input-default" placeholder="Isi Cost Center" required value="{{ $editrkap->cost_center }}">
                                        </div>
                                        <div class="form-group col-md-12 style1">
                                            <label for="nopol">Account</label>
                                            <input type="text" name="gl_acc" id="" class="form-control input-default" placeholder="Isi Account" required value="{{ $editrkap->gl_acc }}">
                                        </div>
                                        <div class="form-group col-md-12 style1">
                                            <label for="nopol">Tahun Rkap</label>
                                            <input type="text" name="tahun_rkap" id="" class="form-control input-default" placeholder="Tahun Rkap" required value="{{ $editrkap->tahun_rkap }}">
                                        </div>
                                        <div class="form-group col-md-12 style1">
                                            <label for="nopol">Nilai Rkap</label>
                                            <input type="text" name="nilai_rkap" id="" class="form-control input-default" placeholder="Nilai Rkap" required value="{{ $editrkap->nilai_rkap }}">
                                        </div>
                                        <div class="form-group col-md-12 style1">
                                            <label for="nopol">Status</label>
                                            <input type="text" name="status" id="" class="form-control input-default" placeholder="Status" required value="{{ $editrkap->status }}">
                                        </div>
                                        {{-- <div class="form-group col-md-12 style1">
                                            <label for="nopol">Departemen</label>
                                            <select name="kd_departemen" id="kd_departemen" class="form-control input-default" required>
                                                <option disabled selected></option>
                                                @foreach ($departemen as $item)
                                                    <option value="{{$item->kd_departemen}}">{{$item->departemen}}</option>
                                                @endforeach
                                            </select>
                                        </div> --}}
                                        
                                    </div>
                                    
                                    <div class="general-button">
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='/transport/rkap-tampil'">Back</button>
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
            $("#kd_departemen").select2({
                placeholder: 'Pilih Departemen',
                allowClear : true
            });
        </script>
        
    @endsection