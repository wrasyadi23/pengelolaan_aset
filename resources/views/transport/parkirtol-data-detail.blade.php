@extends('layouts.master')
@section('title','Data Parkirtol')
@section('content')
<div class="container-fluid mt-3">
    @if (session('message-success'))
        <div class="alert alert-success">{{session('message-success')}}</div>
    @elseif (session('message-error'))
        <div class="alert alert-danger">{{session('message-error')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <form action="/transport/parkirtol-approve" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-6">
                                <h4 class="card-title">Detail Parkir Dan Tol {{ $parkirtol->first()->getPengemudi->nama }} ({{ $parkirtol->first()->nik }})</h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th><div align="center">#</div></th>
                                            <th><div align="center">No</div></th>
                                            <th><div align="center">Kode Parkirtol</div></th>
                                            <th><div align="center">Tangal</div></th>
                                            <th><div align="center">Melayani</div></th>
                                            <th><div align="center">Total</div></th>
                                            <th><div align="center">Status</div></th>
                                            <th><div align="center">Aksi</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($parkirtol as $result => $tolx)
                                        <tr>
                                            <td class="align-middle text-center"><input type="checkbox" name="item[]" id="item[]" value="{{$tolx->kd_parkirtol}}" /></td>
                                            <td align="center">{{++$result}}</td>
                                            <td>{{$tolx->kd_parkirtol}}</td>
                                            <td>{{$tolx->trip_start}}</td>
                                            <td>{{$tolx->melayani}}</td>
                                            <td align="right">{{$tolx ->total}}</td>
                                            <td>{{$tolx->status}}</td>
                                            <td>Detail</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tr>
                                        <td colspan="8" align="center">
                                            <input name="Check_All" value="Check All" onclick="check_all()" type="button" class="btn btn-primary">
                                            <input name="Un_CheckAll" value="Uncheck All" onclick="uncheck_all()" type="button" class="btn btn-primary">
                                            <input name="submit" type="submit" value="submit" class="btn btn-success" >
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script language="javascript">
    function check_all()
    {
        var chk = document.getElementsByName('item[]');
        for (i = 0; i < chk.length; i++)
        chk[i].checked = true ;
    }

    function uncheck_all()
    {
        var chk = document.getElementsByName('item[]');
        for (i = 0; i < chk.length; i++)
        chk[i].checked = false ;
    }
</script>
@endsection
