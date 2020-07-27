    @extends('layouts.master')
    @section('title','Ba Serah Terima Kenaraan Sewa')
    @section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Input Ba Serah Terima Kendaraan Sewa</h4>
                        <div class="card-content">
                            <form action="/transport/store" method="post">
                                @csrf
                                <div class="basic-form">
                                    <div class="form-group">
                                        <label for="regu">kode Sp</label>
                                        <select name="kd_sp" id="kd_sp" class="form-control input-default">
                                            <option disabled selected></option>
                                            @foreach ($rawDataSP as $item)
                                                <option value="{{$item->kd_sp}}">{{$item->no_sp}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bagian"><span class="">No.Ba</span></label>
                                        <span class="">
                                        <input type="text" name="no_ba" id="" class="form-control input-default" placeholder="No.Ba Sewa Baru" required>
                                        </span></div>
                                    <div class="form-group">
                                        <label for="seksi">Uraian</label>
                                        <input type="text" name="uraian" id="" class="form-control input-default" placeholder="Uraian" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="regu">Tanggal Ba</label>
                                        <input type="date" name="tgl" id="" class="form-control input-default" placeholder="Tanggal Ba" required>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="regu">Tgl Awal Sewa</label>
                                            <input type="date" name="tgl_awal" id="" class="form-control input-default" placeholder="Tgl. Mulai Sewa" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="regu">Tgl Akhir Sewa</label>
                                            <input type="date" name="tgl_akhir" id="" class="form-control input-default" placeholder="Tgl Sewa Berakhir" required>
                                        </div>
                                    </div>
                                    <div class="general-button">
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='/pemeliharaan/klasifikasi'">Back</button>
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
            $("#kd_sp").select2({
                placeholder: 'Pilih Nomor SP',
                allowClear: true
            });
        </script>
    @endsection