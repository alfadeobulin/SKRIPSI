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
                                    <h3 class="panel-title">Berita UMKMku</h3>
                                </div>
                                <form class="navbar-form navbar-right" method='GET' action = ''>
                                    <div class="input-group">
                                        <input name="cari" value="" class="form-control" placeholder="Cari . . .">
                                        <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">Cari</button></span>
                                    </div>
                                </form>
                                <div class="panel-body">
                                @if (auth()->user()->role == 'admin')
                                    <a href="/news/createberita" class="btn btn-default fa fa-upload">Unggah Berita</a>
                                @endif
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">JUDUL </th>  
                                            <th scope="col">PENULIS</th>
                                            <th scope="col">ID BERITA</th>
                                            <th scope="col">TANGGAL</th>
                                            <th scope="col">LINK</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($berita as $brt)
                                        <tr>    
                                            <th scope='row'>{{$loop->iteration}}</th>
                                                <td>{{$brt->judul}}</td>
                                                <td>{{$brt->penulis}}</td>
                                                <td>{{$brt->id_berita}}</td>
                                                <td>{{$brt->tgl_terbit}}</td>
                                                <td>{{$brt->link}}</td>
                                                <td>
                                                    <a href="/berita/delete/{{$brt->id_berita}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus berita?')">Delete</a>
                                                </td>
                                        </tr>
                                    @endforeach
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

