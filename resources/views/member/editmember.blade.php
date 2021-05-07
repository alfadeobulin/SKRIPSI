
@extends('umkm.index')

@section('title','Edit Member UMKM')


@section('container')
<div class="container">
<h1>Edit Data Member UMKMku</h1>
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">{{session('sukses')}}</div>@endif
        <div class="row">
            <div class="col-lg-12">
            <form action ="/daftarmemberumkm/update/{{$member->id_member}}" method="POST"> 
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">ID MEMBER</label>
                    <input name="id_member" type="text" class="form-control" id="" aria-describedby="IDMEMBER" value="{{$member->id_member}}" readonly>
                    <div id="emailHelp" class="form-text">NIK yang digunakan harus sesuai dengan KTP pemilik UMKM!</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama </label>
                    <input name="nama_member" type="text"  class="form-control" id="" aria-describedby="NAMA" value="{{$member->nama_member}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">EMAIL MEMBER</label>
                    <input name="email_member" type="text" class="form-control" id="" aria-describedby="EMAIL" value="{{$member->email_member}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NO HANDPHONE</label>
                    <input name="nohp_member" type="text" class="form-control" id="" aria-describedby="EMAIL" value="{{$member->nohp_member}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$member->alamat_member}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">PASSWORD</label>
                    <input name="password" type="text" class="form-control" id="" aria-describedby="PASSWORD" value="{{$member->password}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">ID ADMIN</label>
                    <input name="id_admin" type="text" class="form-control" id="" aria-describedby="IDADMIN" value="{{$member->id_admin}}">
                </div>  
                <button type="submit" class="btn btn-warning">Ubah Data!</button>
            </form>
            </div>
        </div>
</div>
@endsection 