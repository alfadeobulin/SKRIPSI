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
                            <h3 class="panel-title">Form Edit Admin</h3>
                        </div>
                            <div class="panel-body text-wrap">
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <form action ="/admin/update/{{$users->id_users}}" method="POST" enctype="multipart/form-data"> 
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">Nama</label>
                                                <input name="name" type="text" class="form-control" id="InputIdGaleri" aria-describedby="ID Galeri" value="{{$users->name}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">Email Admin</label>
                                                <input name="email" type="text" class="form-control" id="InputGaleri" aria-describedby="Nama Galeri" value="{{$users->email}}" >
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