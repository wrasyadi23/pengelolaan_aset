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
            <div class="col-sm-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h5>Belajar - Expand Collapse Row Table</h5>
                  </div>
                  <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover" style="width: 100%;">
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
                                <tr class="header2 expand">
                                        <td class="align-middle text-center"><input type="checkbox" name="item[]" id="item[]" value="{{$tolx->kd_pengemudi}}" /></td>
                                        <td align="center">{{++$result}}</td>
                                        <td>{{$tolx->nik}}</td>
                                        <td>{{$tolx->getPengemudi->nama}}</td>
                                        <td>{{$tolx ->total}}</td>
                                        <td>{{$tolx->status}}</td>
                                        <td><input type="text" name="deatil" value="{{$tolx->kd_pengemudi}}" hidden>  <span class="sign">detail</span></td>
                                </tr>
                                <tr style="width: 100%;">
                                    <td colspan="7">
                                        <form action="/transport/parkirtol-approve" method="post">
                                            @csrf
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover" style="width: 100%;" border="1" rules="all">
                                                    <thead>
                                                    <tr>
                                                        <th><div align="center">#</div></th>
                                                        <th><div align="center">No</div></th>
                                                        <th><div align="center">Kode Parkirtol</div></th>
                                                        <th><div align="center">Tangal</div></th>
                                                        <th><div align="center">Melayani</div></th>
                                                        <th><div align="center">Total</div></th>
                                                        <th><div align="center">Aksi</div></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($detailparkirtol as $result => $tolx)
                                                        <tr>
                                                            <td class="align-middle text-center"><input type="checkbox" name="item2[]" id="item2[]" value="{{$tolx->kd_parkirtol}}" /></td>
                                                            <td align="center">{{++$result}}</td>
                                                            <td>{{$tolx->kd_parkirtol}}</td>
                                                            <td>{{$tolx->trip_start}}</td>
                                                            <td>{{$tolx->melayani}}</td>
                                                            <td align="right">{{$tolx ->total}}</td>
                                                            <td>Detail</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="7" align="center">
                                                                <input name="Check" value="Check All" onclick="check()" type="button" class="btn btn-primary">
                                                                <input name="Un_Check" value="Uncheck All" onclick="uncheck()" type="button" class="btn btn-primary">
                                                                <input name="submit" type="submit" value="submit" class="btn btn-success" >
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>







        <div class="col-lg-12">
            <form action="/transport/parkirtol-approveAll" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>Parkir Dan Tol</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered" style="width: 100%;">
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
                                            <td>detail</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7" align="center">
                                            <input name="Check_All" value="Check All" onclick="check_all()" type="button" class="btn btn-primary">
                                            <input name="Un_CheckAll" value="Uncheck All" onclick="uncheck_all()" type="button" class="btn btn-primary">
                                            <input name="submit" type="submit" value="submit" class="btn btn-success" >
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
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

    function check()
    {
        var chk = document.getElementsByName('item2[]');
        for (i = 0; i < chk.length; i++)
        chk[i].checked = true ;
    }

    function uncheck()
    {
        var chk = document.getElementsByName('item2[]');
        for (i = 0; i < chk.length; i++)
        chk[i].checked = false ;
    }
</script>
<style>
    tr.header2{
    cursor:pointer;
    }

    .header2 .sign:after{
        content:"+";
        display:inline-block;
    }

    .header2.expand .sign:after{
        content:"-";
    }
</style>
<script language="javascript">
    $( document ).ready(function() { // Handler for .ready() called.
    // sebagai action ketika row diklik
    $('.header2').click(function(){
        $(this).toggleClass('expand').nextUntil('tr.header2').slideToggle(100);
    });

    $('.header2').click();
    });
</script>
@endsection
