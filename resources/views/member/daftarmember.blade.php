
@extends('umkm.index')

@section('title','Daftar UMKM')


@section('container')
<div class="container">
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">{{session('sukses')}}</div>@endif
        <div class="row">
            <div class="col-6">
                <h1 class="col-15"> Daftar Member UMKMku </h1>
            </div>
                <div class="col-6">
                    <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data Member</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah member UMKMku</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                                <div class="modal-body">
                                                    <form action ="/createmember" method="POST"> 
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">NIK</label>
                                                            <input name="no_ktp" type="text" class="form-control" id="InputNik" aria-describedby="NIK">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Nama </label>
                                                            <input name="nama" type="text"  class="form-control" id="InputNama" aria-describedby="NAMA">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Telp</label>
                                                            <input name="no_telp" type="text" class="form-control" id="InputTelp" aria-describedby="TELP">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                        </div>
                                                        </div>
                                                        <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit"   class="btn btn-primary" > Tambahkan!</button>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                        </div>
                </div>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">NO</th>
                <th scope="col">NIK </th>
                <th scope="col">NAMA</th>   
                <th scope="col">TELP</th>
                <th scope="col">ALAMAT</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($member as $mbr)
            <tr>    
                <th scope='row'>{{$loop->iteration}}</th>
                    <td>{{$mbr->no_ktp}}</td>
                    <td>{{$mbr->nama}}</td>
                    <td>{{$mbr->no_telp}}</td>
                    <td>{{$mbr->alamat}}</td>
                    <td>
                        <a href="/daftarmemberumkm/edit/{{$mbr->id}}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/daftarmemberumkm/delete/{{$mbr->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">Delete</a>
                    </td>
            </tr>
        @endforeach
        </tbody>
    </table>    
    </div>
</div>
@endsection 