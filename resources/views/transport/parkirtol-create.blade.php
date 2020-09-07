@extends('layouts.master')
@section('title','Parkir & Tol')
@section('content')
<div class="container-fluid mt-3">
    <span id="result"></span>
    <div class="row">
        <div class="col-lg-12">
            <form action="/parkirtol-store" method="post" id="dynamic_form">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-6">
                                <h4 class="card-title">Parkir & Tol</h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for="uangmuka">No. Uangmuka</label>
                                    <select name="kd_uangmuka" id="kd_uangmuka" class="form-control input-default" required>
                                        <option disabled selected></option>
                                        @foreach ($uangmuka as $item)
                                            <option value="{{$item->kd_uangmuka}}">{{$item->no_uangmuka}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <select name="kd_pengemudi" id="kd_pengemudi" class="form-control input-default" required>
                                        <option disabled selected></option>
                                        @foreach ($pengemudi as $item)
                                            <option value="{{$item->kd_pengemudi}}">{{$item->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tgl">Tanggal</label>
                                    <input type="date" name="tgl" id="" class="form-control input-default" required>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="trip_start">Trip Start</label>
                                        <input type="date" name="trip_start" id="" class="form-control input-default" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="trip_end">Trip End</label>
                                        <input type="date" name="trip_end" id="" class="form-control input-default" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="melayani">Melayani</label>
                                    <input type="text" name="melayani" id="melayani" class="form-control input-default" required>
                                </div>
                                <div class="form-group">
                                    <label for="uraian">Uraian</label>
                                    <input type="text" name="uraian" id="uraian" class="form-control input-default" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-6">
                                <h4 class="card-title">Detail Parkir & Tol</h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="basic-form">
                               <table class="table table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>Nilai Karcis</th>
                                            <th>Jml karcis</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2" align="justify">
                                                <b><span class="pull-right">Total</span></b>
                                            </td>
                                            <td>
                                                <b><span id="total"></span></b>
                                            </td>
                                            {{-- <td>
                                                <input type="text" name="total" id="total2">
                                            </td> --}}
                                        </tr>
                                      </tfoot>
                               </table>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="save" id="save">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $("#kd_uangmuka").select2({
            placeholder: 'Pilih Uang Muka',
            allowClear: true
        });
        $("#kd_pengemudi").select2({
            placeholder: 'Pilih Pengemudi',
            allowClear: true
        });

    </script>
    <script>
    $(document).ready(function(){

            var count = 1;
            parkirtol_detail(count);

            function parkirtol_detail(number)
            {
                tr = '<tr class="temp-row">';
                tr += '<td><input type="text" name="nilai_karcis[]" id="nilai_karcis-' + count + '" class="form-control input-default hitung" /></td>';
                tr += '<td><input type="text" name="jml_karcis[]" id="jml_karcis-' + count + '" class="form-control input-default hitung" /></td>';
                tr += '<td><input type="text" name="total[]" id="total-' + count + '" class="form-control input-default total" readonly/></td>';
                if(number > 1)
                {
                    tr += '<td><button type="button" name="remove" id="" class="btn btn-sm btn-danger remove">Remove</button></td></tr>';
                    $('tbody').append(tr);
                }
                else
                {
                    tr += '<td><button type="button" name="add" id="add" class="btn btn-sm btn-success">Add</button></td></tr>';
                    $('tbody').html(tr);
                }
            }

            function resetForm(){
                $("#dynamic_form").trigger('reset');
                $('#total').html(" ");
                // $('#total2').html(" ");
                $('#kd_uangmuka').select2();
                $('#kd_pengemudi').select2();
                $('.temp-row').remove();
            }

            $('body').on('focus', '.hitung', function() {
                var id = $(this).attr('id'),
                    hitung = id.split('-');
                $(this).keydown(function() {
                    setTimeout(function() {
                        var nilai_karcis = ($('#nilai_karcis-' + hitung[1]).val() != '' ? $('#nilai_karcis-' + hitung[1]).val() : 0),
                            jml_karcis = ($('#jml_karcis-' + hitung[1]).val() != '' ? $('#jml_karcis-' + hitung[1]).val() : 0),
                            subtotal = parseInt(nilai_karcis) * parseInt(jml_karcis);
                        if (!isNaN(subtotal)) {
                            $('#total-' + hitung[1]).val(subtotal);
                            var alltotal = 0;
                            $('.total').each(function(){
                                alltotal += parseFloat($(this).val());
                            });
                            var hasil = rupiah(alltotal);
                            $('#total').html("Rp. "+hasil);
                            // $('#total2').val(alltotal);
                        }
                    }, 50);
                });
            });

            function rupiah(nStr){
                nStr += '';
                x = nStr.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + '.' + '$2');
                }
                return x1 + x2;
            }

            $(document).on('click', '#add', function(){
            count++;
            parkirtol_detail(count);
            });

            $(document).on('click', '.remove', function(){
            count--;
            $(this).closest("tr").remove();
            });

            $('#dynamic_form').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:'{{ route("transport.parkirtol-store") }}',
                    method:'post',
                    data:$(this).serialize(),
                    dataType:'json',
                    beforeSend:function(){
                        $('#save').attr('disabled','disabled');
                    },
                    success:function(data)
                    {
                        if(data.error)
                        {
                            var error_html = '';
                            for(var count = 0; count < data.error.length; count++)
                            {
                                error_html += '<p>'+data.error[count]+'</p>';
                            }
                            $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                        }
                        else
                        {
                            resetForm();
                            parkirtol_detail(1);
                            $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                        }
                        $('#save').attr('disabled', false);
                    }
                })
        });

    });
    </script>
@endsection
