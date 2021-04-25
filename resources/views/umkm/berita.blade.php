@extends('umkm.index')

@section('title','Berita UMKMku')

@section('container')
<div class="container">
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">{{session('sukses')}}</div>@endif
        <div class="row">
            <div class="col-6">
                <h1 class="col-15"> Berita UMKMku </h1>
            </div>
                <div class="col-6">
                    <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data Berita</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah berita</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                                <div class="modal-body">
                                                    <form action ="/createberita" method="POST"> 
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Judul</label>
                                                            <input name="judul" type="text" class="form-control" id="InputBerita" aria-describedby="JUDUL">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlTextarea1" class="form-label">Isi</label>
                                                            <textarea name="isi" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Penulis</label>
                                                            <input name="penulis" type="text" class="form-control" id="InputPenulis" aria-describedby="PENULIS">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">ID Berita</label>
                                                            <input name="id_berita" type="text" class="form-control" id="InputId_berita" aria-describedby="ID Berita">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                                                            <input name="tgl_terbit" type="text" class="form-control" id="InputTgl_terbit" aria-describedby="TANGGAL">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Link</label>
                                                            <input name="link" type="text" class="form-control" id="InputLink" aria-describedby="LINK">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">ID Admin</label>
                                                            <input name="id_admin" type="text" class="form-control" id="InputId_admin" aria-describedby="ID Admin">
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
                <th scope="col">JUDUL </th>
                <th scope="col">ISI</th>   
                <th scope="col">PENULIS</th>
                <th scope="col">ID BERITA</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">LINK</th>
                <th scope="col">ID ADMIN</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($berita as $brt)
            <tr>    
                <th scope='row'>{{$loop->iteration}}</th>
                    <td>{{$brt->judul}}</td>
                    <td>{{$brt->isi}}</td>
                    <td>{{$brt->penulis}}</td>
                    <td>{{$brt->id_berita}}</td>
                    <td>{{$brt->tgl_terbit}}</td>
                    <td>{{$brt->link}}</td>
                    <td>{{$brt->id_admin}}</td>
                    <td>
                        <a href="/berita/delete/{{$brt->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus berita?')">Delete</a>
                    </td>
            </tr>
        @endforeach
        </tbody>
    </table>    
    </div>
</div>
@endsection 
  