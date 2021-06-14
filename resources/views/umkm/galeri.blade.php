@extends('umkm.index')

@section('content')
    <div class = "main">
        <div class="main-content">
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">{{session('sukses')}}</div>
        @endif
            <div class = "container-fluid ">
                <div class="row">
                    <div class="col-md-12">
                        <!-- TABLE HOVER -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Galeri UMKMku</h3>
                                </div>
                                <form class="navbar-form navbar-right" method='GET' action = ''>
                                    <div class="input-group">
                                        <input name="cari" value="" class="form-control" placeholder="Cari . . .">
                                        <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">Cari</button></span>
                                    </div>
                                </form>
                                <div class="panel-body text-wrap">
                                @if (auth()->user()->role == 'member')
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Tambah Data Galeri</button>
                                @endif
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Keterangan</th>
                                            <th>Foto</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($galeri as $glr)
                                        <tr>
                                        <th scope='row'>{{$loop->iteration}}</th>
                                            <td>{{$glr->ktrgn_foto}}</td>
                                            <td><img src="images/galeri/{{$glr->foto}}" class="rounded" alt="foto" width="200" height="100"></td>
                                            <td>
                                            @if (auth()->user()->role == 'member')
                                                <a href="/galeri/edit/{{$glr->id_galeri}}" class="btn btn-warning btn-sm">Edit</a>
                                            @endif
                                                <a href="/galeri/delete/{{$glr->id_galeri}}" class="btn btn-danger btn-sm delete">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                            </div>
                        <!-- END TABLE HOVER -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah berita</h5>
                            <div class="modal-body">
                            <form action ="/creategaleri" method="POST"> 
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ID Galeri</label>
                                    <input name="id_galeri" type="text" class="form-control" id="InputIdGaleri" aria-describedby="ID Galeri">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Galeri</label>
                                    <input name="nama_gal" type="text" class="form-control" id="InputGaleri" aria-describedby="Nama Galeri">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Foto</label>
                                    <input name="foto" type="file" class="form-control" id="InputFoto" aria-describedby="Foto">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ID Usaha</label>
                                    <input name="id_usaha" type="text" class="form-control" id="InputLink" aria-describedby="LINK">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                                    <textarea name="ktrgn_foto" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit"   class="btn btn-primary" > Tambahkan!</button>
                            </form>
                    </div>
                </div>
            </div>
    </div>
</div>
   
@endsection
    

  