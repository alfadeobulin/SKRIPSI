
@extends('umkm.index')

@section('title','Daftar UMKM')


@section('container')
<div class="container">
    <h1>Edit data Member</h1>
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">{{session('sukses')}}</div>@endif
        <div class="row">
    <form action ="/editmember/{{$member->mbr}}/update" method="POST"> 
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">NIK</label>
            <input name="no_ktp" type="text" class="form-control" id="InputNik" aria-describedby="NIK"  value="{{$mbr->no_ktp}}">
            <div id="emailHelp" class="form-text">NIK yang digunakan harus sesuai dengan KTP pemilik UMKM!</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama </label>
            <input name="nama" type="text"  class="form-control" id="InputNama" aria-describedby="NAMA" value="{{$mbr->nama}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Telp</label>
            <input name="no_telp" type="text" class="form-control" id="InputTelp" aria-describedby="TELP" value="{{$mbr->no_telp}}">
        </div>
        <div class="mb-3">  
            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{$mbr->alamat}}"> </textarea>
        </div>
        </div>
        <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit"   class="btn btn-warning" > UPDATE </button>
    </form>   
    </div>
</div>
@endsection 