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
                                <h3 class="panel-title">Daftar Admin UMKMku</h3>
                            </div>
                            <form class="navbar-form navbar-right" method='GET' action = ''>
                                    <div class="input-group">
                                        <input name="cari" value="" class="form-control" placeholder="Cari . . .">
                                        <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">Cari</button></span>
                                    </div>
                                </form>
                            <div class="panel-body">
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Tambah Data Admin</button>
                            <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">NO</th>  
                                                <th scope="col">ID ADMIN  </th>  
                                                <th scope="col">NAMA</th>
                                                <th scope="col">EMAIL</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($user as $usr)
                                            <tr>    
                                                <th scope='row'>{{$loop->iteration}}</th>
                                                <td>{{$usr->id_users}}</td>
                                                <td>{{$usr->name}}</td>
                                                <td>{{$usr->email}}</td>
                                                <td>
                                                    <a href="/daftaradmin/delete/{{$usr->id_users}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">Delete</a>
                                                    <a href="/profileadmin/profile/{{$usr->id_users}}" class="btn btn-success btn-sm">Profile</a>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Admin UMKMku</h5>
                            <div class="modal-body">
                                <form action ="/createadmin" method="POST"> 
                                    @csrf
                                    <div class="mb-3">
                                        <div class="form-group {{$errors->has('nama_admin') ? 'has-error' : ''}}">
                                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                                        <input name="name" type="text" class="form-control" id="InputTelp" aria-describedby="name" value="{{old('name')}}">
                                        @if($errors->has('name'))
                                        <span class="help-block">{{$errors->first('name')}}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                                        <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                                        <input name="email" type="text" class="form-control" id="InputEmail" aria-describedby="Email" value="{{old('email')}}">
                                        @if($errors->has('email'))
                                        <span class="help-block">{{$errors->first('email')}}</span>
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