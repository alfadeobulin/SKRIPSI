
@extends('umkm.index')

@section('title','Daftar UMKM')


@section('container')
<div class="container">
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">{{session('sukses')}}</div>@endif
        <div class="row">
            <div class="col-6">
                <h1 class="col-15"> Daftar Admin UMKMku </h1>
            </div>
                <div class="col-6">
                    <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data Admin</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Admin UMKMku</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                                <div class="modal-body">
                                                    <form action ="/createadmin" method="POST"> 
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Nama </label>
                                                            <input name="nama_admin" type="text"  class="form-control" id="InputNama" aria-describedby="NAMA">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Telp</label>
                                                            <input name="no_telp" type="text" class="form-control" id="InputTelp" aria-describedby="TELP">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                                                            <input name="email_admin" type="text" class="form-control" id="InputEmail" aria-describedby="Email">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">ID Admin</label>
                                                            <input name="id_admin" type="text" class="form-control" id="InputId" aria-describedby="IDADMIN">
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
                <th scope="col">NAMA  </th>  
                <th scope="col">TELP</th>
                <th scope="col">EMAIL</th>
                <th scope="col">ID ADMIN</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($admin as $adm)
            <tr>    
                <th scope='row'>{{$loop->iteration}}</th>
                    <td>{{$adm->nama_admin}}</td>
                    <td>{{$adm->no_telp}}</td>
                    <td>{{$adm->email_admin}}</td>
                    <td>{{$adm->id_admin}}</td>
                    <td>
                        <a href="/daftaradmin/delete/{{$adm->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">Delete</a>
                    </td>
            </tr>
        @endforeach
        </tbody>
    </table>    
    </div>
</div>
@endsection 