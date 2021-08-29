
@extends('umkm.index')

@section('content')
@if(session('sukses'))
<div class="alert alert-success" role="alert">{{session('sukses')}}</div>
@endif
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Form Edit Member</h3>
                        </div>
                    <div class="panel-body text-wrap">
                            <div class="panel-body">
                        <table class="table table-hover">
                            <form action ="/daftarmemberumkm/update/{{$member->id_users}}" method="POST" enctype="multipart/form-data"> 
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">ID Member</label>
                                    <input name="id_users" type="text" class="form-control" id="" aria-describedby="IDUSERS" value="{{$member->id_users}}" readonly>
                                </div>
                                <div class="form-group">
                                <div class="form-group {{$errors->has('alamat_member') ? 'has-error' : ''}}">
                                    <label for="exampleInputEmail1" class="form-label">Nama </label>
                                    <input name="nama_member" type="text"  class="form-control" id="" aria-describedby="NAMA" value="{{$member->nama_member}}">
                                    @if($errors->has('nama_member'))
                                    <span class="help-block">{{$errors->first('nama_member')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="form-group {{$errors->has('nohp_member') ? 'has-error' : ''}}">
                                    <label for="exampleInputEmail1" class="form-label">No Telp</label>
                                    <input name="nohp_member" type="text" class="form-control" id="" aria-describedby="EMAIL" value="{{$member->nohp_member}}">
                                    @if($errors->has('nohp_member'))
                                    <span class="help-block">{{$errors->first('nohp_member')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="form-group {{$errors->has('alamat_member') ? 'has-error' : ''}}">
                                    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                    <textarea name="alamat_member" class="form-control" id="alamat_member" rows="3">{{$member->alamat_member}}</textarea>
                                    @if($errors->has('alamat_member'))
                                    <span class="help-block">{{$errors->first('alamat_member')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="form-group {{$errors->has('avatar') ? 'has-error' : ''}}">
                                    <label for="exampleFormControlTextarea1" class="form-label">Foto Profil</label>
                                    <input name="avatar" type="file" class="form-control" id="" aria-describedby="EMAIL" value="{{$member->avatar}}">
                                    @if($errors->has('avatar'))
                                    <span class="help-block">{{$errors->first('avatar')}}</span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-warning btn-sm">Ubah Data!</button>
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