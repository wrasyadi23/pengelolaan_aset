@extends('layouts.master')
@section('title', 'Kontrak/SP')
@section('content')
<div class="container-fluid mt-3">
    @if (session('message-success'))
        <div class="alert alert-success">{{session('message-success')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail Kontak/SP</h4>
                    <div class="card-content">
                        <div class="table-responsive">
                                
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection