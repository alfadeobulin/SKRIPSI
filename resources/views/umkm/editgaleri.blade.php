
@extends('umkm.index')

@section('content')
@if(session('sukses'))
<div class="alert alert-success" role="alert">{{session('sukses')}}</div>
@endif
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Form Edit Galeri</h3>
                        </div>
                            <div class="panel-body text-wrap">
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <form action ="/galeri/update/{{$galeri->id_galeri}}" method="POST" enctype="multipart/form-data"> 
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">ID Galeri</label>
                                                <input name="id_galeri" type="text" class="form-control" id="InputIdGaleri" aria-describedby="ID Galeri" value="{{$galeri->id_galeri}}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">Nama Galeri</label>
                                                <input name="nama_gal" type="text" class="form-control" id="InputGaleri" aria-describedby="Nama Galeri" value="{{$galeri->nama_gal}}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">Foto</label>
                                                <input name="foto" type="file" class="form-control" id="InputFoto" aria-describedby="Foto" value="{{$galeri->foto}}">
                                                <img src="{{asset('images/galeri/'.$galeri->foto)}}" height="10%" width="50%" alt="" srcset="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">ID Usaha</label>
                                                <input name="id_usaha" type="text" class="form-control" id="InputLink" aria-describedby="ID Usaha" value="{{$galeri->id_usaha}}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                                                <textarea name="ktrgn_foto" class="form-control" id="KETERANGAN" rows="3">{{$galeri->ktrgn_foto}}</textarea>
                                            </div>
                                            <button type="submit" class="btn btn-warning btn-sm">Ubah Data!</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- END TABLE HOVER -->
                </div>
            </div>
        </div>
    </div>
</div>



            
@endsection 