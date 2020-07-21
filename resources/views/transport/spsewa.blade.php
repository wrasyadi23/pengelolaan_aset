@extends('layouts.master')
@section('title','Input Pekerjaan')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form SP Sewa Baru</h4>
            <div class="basic-form">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>No SP Sewa</label>
                            <input type="text" class="form-control" placeholder="Sp Sewa Baru">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Cost Center</label>
                            <input type="text" class="form-control" placeholder="Cost Center">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Gl Account</label>
                            <input type="text" class="form-control" placeholder="Gl Account">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Id Aktifitas Rkap</label>
                            <input type="Id Aktifitas Rkap" class="form-control" placeholder="Id Aktifitas Rkap">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Gl Account</label>
                            <input type="text" class="form-control" placeholder="Gl Account">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Id Aktifitas Rkap</label>
                            <input type="Id Aktifitas Rkap" class="form-control" placeholder="Id Aktifitas Rkap">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Gl Account</label>
                            <input type="text" class="form-control" placeholder="Gl Account">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Id Aktifitas Rkap</label>
                            <input type="Id Aktifitas Rkap" class="form-control" placeholder="Id Aktifitas Rkap">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Gl Account</label>
                            <input type="text" class="form-control" placeholder="Gl Account">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Id Aktifitas Rkap</label>
                            <input type="Id Aktifitas Rkap" class="form-control" placeholder="Id Aktifitas Rkap">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>City</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>State</label>
                            <select id="inputState" class="form-control">
                                <option selected="selected">Choose...</option>
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Zip</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Check me out</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection