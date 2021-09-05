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
                                <div class="text-left"><a href="/galeri" class="btn btn-success">Ke Semua Galeri</a></div>
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
                                        @foreach ((array)$galeri as $glr)
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
   
   
@endsection
    

  