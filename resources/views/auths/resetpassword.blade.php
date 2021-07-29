@extends('umkm.index')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Reset Password Anda</h3>
                    </div>
                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{session('error')}}
                    </div>
                    @endif
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                    @endif
                    <div class="panel-body text-wrap">
                    <div class="panel-body">
                                    <table class="table table-hover">
                            <div class="col-md-6">
                                <form action="{!! route('ganti.password')!!}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="passwordsekarang">Password Sekarang</label>
                                        <input type="password" class="form-control" id="passwordsekarang"
                                            name="passwordsekarang">
                                    </div>
                                    <div class="form-group">
                                        <label for="passwordbaru">Masukan Password Baru Anda</label>
                                        <input type="password" class="form-control" id="passwordbaru"
                                            name="passwordbaru">
                                        @if($errors->has('passwordbaru'))
                                        <span class="help-block">{{$errors->first('passwordbaru')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="konfirmasipassword">Konfirmasi Password Anda</label>
                                        <input type="password" class="form-control" id="konfirmasipassword"
                                            name="konfirmasipassword">
                                        @if($errors->has('konfirmasipassword'))
                                        <span class="help-block">{{$errors->first('konfirmasipassword')}}</span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-warning">Ganti Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection