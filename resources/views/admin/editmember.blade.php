
@extends('umkm.index')

@section('title','Edit Member UMKM')


@section('container')
<div class="container">
<h1>Edit Data Member UMKMku</h1>
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">{{session('sukses')}}</div>@endif
        <div class="row">
            <div class="col-lg-12">
            <form action ="/daftarmemberumkm/update/{{$member->id}}" method="POST"> 
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NIK</label>
                    <input name="no_ktp" type="text" class="form-control" id="InputNik" aria-describedby="NIK" value="{{$member->no_ktp}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama </label>
                    <input name="nama" type="text"  class="form-control" id="InputNama" aria-describedby="NAMA" value="{{$member->nama}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Telp</label>
                    <input name="no_telp" type="text" class="form-control" id="InputTelp" aria-describedby="TELP" value="{{$member->no_telp}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$member->alamat}}</textarea>
                </div>              
                <button type="submit" class="btn btn-warning">Ubah Data!</button>
            </form>
            </div>
        </div>
</div>
@endsection 