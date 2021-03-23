<style type="text/css">
    .style1 {color: #0000FF}
    </style>
    @extends('layouts.master')
    @section('title','Input Uangmuka Perjaka')
    @section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Input Uangmuka Perjaka</h4>
                        <div class="card-content">
                            <form action="/transport/umperjaka-update/{{ $editum->kd_uangmuka }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="basic-form">
                                    <div class="form-group">
                                        <label for="gl_account"><span class="style1">Commit Item/Gl. Account</span></label>
                                        <select name="kd_aktifitas_rkap" id="kd_aktifitas_rkap" class="form-control input-default" required>
                                            <option disabled selected></option>
                                            @foreach ($rkapDetail as $itemRkap)
                                            <option value="{{$itemRkap->kd_aktifitas_rkap}}" @if ($itemRkap->kd_aktifitas_rkap == $editum->kd_aktifitas_rkap) selected @endif>{{$itemRkap->getRkap->gl_acc}} - {{$itemRkap->nama_aktifitas}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                  <div class="form-group">
                                      <label for="requester"><span class="style1">Requester</span></label>
                                      <span class="style1">
                                        <select name="nik" id="nik" class="form-control input-default" required>
                                          <option disabled selected></option>
                                                
                                            @foreach ($karyawan as $itemKaryawan)
                                            <option value="{{$itemKaryawan->nik}}" @if ($itemKaryawan->nik == $editum->nik) selected @endif>{{$itemKaryawan->nama}}</option>
                                        @endforeach
                                    </select>
                                        
                                        </select>
                                        </span></div>
                                    <div class="form-group style1">
                                        <label for="no_uangmuka">Nomor Uangmuka</label>
                                        <input type="text" name="no_uangmuka" id="" class="form-control input-default" value="{{ $editum->no_uangmuka }}">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <span class="style1">
                                            <label for="periode">Periode</label>
                                            </span>
                                            <input type="date" name="tgl_awal" id="" class="form-control input-default" required value="{{ $editum->tgl_awal }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="periode">&nbsp;</label>
                                            <input type="date" name="tgl_akhir" id="" class="form-control input-default" required value="{{ $editum->tgl_akhir }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nilai_uangmuka"><span class="style1">Nilai Uangmuka</span></label>
                                        <input type="number" name="nilai_uangmuka" id="" class="form-control input-default" required value="{{ $editum->nilai_uangmuka }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="uraian"><span class="style1">Uraian</span></label>
                                        <textarea name="uraian" id="" cols="30" rows="5" class="form-control input-default" required >{{$editum->uraian}}</textarea>
                                    </div>
                                    <div class="general-button">
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='/transport/umperjaka'">Back</button>
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
            $("#kd_aktifitas_rkap").select2({
                placeholder: 'Pilih Commit Item/Gl. Account',
                allowClear: true
            });
            $("#nik").select2({
                placeholder: 'Pilih Requester',
                allowClear: true
            });
        </script>
    @endsection