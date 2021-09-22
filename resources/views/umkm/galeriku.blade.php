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
                                            <th>Nama Galeri</th>
                                            <th>Nama Usaha</th>
                                            <th>Keterangan</th>
                                            <th>Foto</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($galeri as $glr)
                                        <tr>
                                            <td>{{$glr->nama_gal}}</td>
                                            <td>{{$glr->nama_ush}}</td>
                                            <td>{{$glr->ktrgn_foto}}</td>
                                            <td><img src="images/galeri/{{$glr->foto}}" class="rounded" alt="foto" width="200" height="100"></td>
                                            <td>
                                            @if (auth()->user()->role == 'member')
                                                <a href="/galeri/edit/{{$glr->id_galeri}}" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="/galeri/delete/{{$glr->id_galeri}}" class="btn btn-danger btn-sm delete">Delete</a>
                                            @endif
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Galeri</h5>
                            <div class="modal-body">
                            <form action ="/creategaleri" method="POST" enctype="multipart/form-data"> 
                                @csrf
                                <div class="mb-3">
                                    <div class="form-group {{$errors->has('nama_gal') ? 'has-error' : ''}}">
                                    <label for="exampleInputEmail1" class="form-label">Nama Galeri</label>
                                    <input name="nama_gal" type="text" class="form-control" id="InputGaleri" aria-describedby="Nama Galeri" value="{{old('nama_gal')}}">
                                    @if($errors->has('nama_gal'))
                                    <span class="help-block">{{$errors->first('nama_gal')}}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <div class="form-group {{$errors->has('foto') ? 'has-error' : ''}}">
                                    <label for="exampleInputEmail1" class="form-label">Foto</label>
                                    <input name="foto" type="file" class="form-control" id="foto" aria-describedby="Foto" value="{{old('foto')}}">
                                    @if($errors->has('foto'))
                                    <span class="help-block">{{$errors->first('foto')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="form-label" >Usaha</label>
                                    <select name="id_usaha" class="form-control">
                                    <option value="">-Pilih Usaha Anda-</option>
                                    <option value="{{$glr->id_usaha}}">{{$glr->nama_ush}}</option>
                                    </select>  
                                </div>
                                <div class="mb-3">
                                    <div class="form-group {{$errors->has('ktrgn_foto') ? 'has-error' : ''}}">
                                    <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                                    <textarea name="ktrgn_foto" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{old('ktrgn_foto')}}"></textarea>
                                    @if($errors->has('ktrgn_foto'))
                                    <span class="help-block">{{$errors->first('ktrgn_foto')}}</span>
                                    @endif
                                </div>
                                <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit"   class="btn btn-primary" > Tambahkan!</button>
                            </form>
                    </div>
                </div>
            </div>
    </div>
</div>
   
   
@endsection
    

  