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
            <form action="/transport/parkirtol-approveAll" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-6">
                                <h4 class="card-title">Parkir Dan Tol</h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th><div align="center">#</div></th>
                                            <th><div align="center">No</div></th>
                                            <th><div align="center">Nik</div></th>
                                            <th><div align="center">Nama</div></th>
                                            <th><div align="center">Total</div></th>
                                            <th><div align="center">Status</div></th>
                                            <th><div align="center">Aksi</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($parkirtol as $result => $tolx)
                                        <tr>
                                            <td class="align-middle text-center"><input type="checkbox" name="item[]" id="item[]" value="{{$tolx->kd_pengemudi}}" /></td>
                                            <td align="center">{{++$result}}</td>
                                            <td>{{$tolx->nik}}</td>
                                            <td>{{$tolx->getPengemudi->nama}}</td>
                                            <td>{{$tolx ->total}}</td>
                                            <td>{{$tolx->status}}</td>
                                            <td>
                                                <a href="parkirtol-data/{{$tolx->nik}}">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tr>
                                        <td colspan="7" align="center">
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
