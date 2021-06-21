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
                                    <h3 class="panel-title">Daftar Member UMKMku</h3>
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
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Tambah Data Member</button>
                                @endif
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">NO</th>
                                                <th scope="col">ID MEMBER </th>
                                                <th scope="col">NAMA</th>   
                                                <th scope="col">NO TELP</th>
                                                <th scope="col">ALAMAT</th>
                                                <th scope="col">ID ADMIN</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($member as $mbr)
                                            <tr>    
                                                <th scope='row'>{{$loop->iteration}}</th>
                                                    <td>{{$mbr->id_member}}</td>
                                                    <td>{{$mbr->nama_member}}</td>
                                                    <td>{{$mbr->nohp_member}}</td>
                                                    <td>{{$mbr->alamat_member}}</td>
                                                    <td>{{$mbr->id_admin}}</td>
                                                    <td>
                                                        @if (auth()->user()->role == 'admin')
                                                        <a href="/daftarmemberumkm/delete/{{$mbr->id_member}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">Delete</a>
                                                        @endif
                                                        <a href="/profilemember/profile/{{$mbr->id_member}}" class="btn btn-success btn-sm">Profile</a>
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
    <div class="col-6">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah member UMKMku</h5>
                                <div class="modal-body">
                                <form action ="/createmember" method="POST"> 
                                    @csrf
                                    <div class="mb-3">
                                        <div class="form-group {{$errors->has('id_member') ? 'has-error' : ''}}">
                                        <label for="exampleInputEmail1" class="form-label">ID MEMBER</label>
                                        <input name="id_member" type="text" class="form-control" id="" aria-describedby="IDMEMBER" value="{{old('id_member')}}">
                                        @if($errors->has('id_member'))
                                        <span class="help-block">{{$errors->first('id_member')}}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group {{$errors->has('nama_member') ? 'has-error' : ''}}">
                                        <label for="exampleInputEmail1" class="form-label">Nama </label>
                                        <input name="nama_member" type="text"  class="form-control" id="" aria-describedby="NAMA" value="{{old('nama_member')}}">
                                        @if($errors->has('nama_member'))
                                        <span class="help-block">{{$errors->first('nama_member')}}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                                        <label for="exampleInputEmail1" class="form-label">EMAIL MEMBER</label>
                                        <input name="email" type="text" class="form-control" id="" aria-describedby="EMAIL" value="{{old('email')}}">
                                        @if($errors->has('email'))
                                        <span class="help-block">{{$errors->first('email')}}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group {{$errors->has('nohp_member') ? 'has-error' : ''}}">
                                        <label for="exampleInputEmail1" class="form-label">NO HANDPHONE</label>
                                        <input name="nohp_member" type="text" class="form-control" id="" aria-describedby="EMAIL" value="{{old('nohp_member')}}">
                                        @if($errors->has('nohp_member'))
                                        <span class="help-block">{{$errors->first('nohp_member')}}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group {{$errors->has('alamat_member') ? 'has-error' : ''}}">
                                        <label for="exampleFormControlTextarea1" class="form-label" >Alamat</label>
                                        <textarea name="alamat_member" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{old('alamat_member')}}" ></textarea>
                                        @if($errors->has('alamat_member'))
                                        <span class="help-block">{{$errors->first('alamat_member')}}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group {{$errors->has('id_admin') ? 'has-error' : ''}}">
                                        <label for="exampleInputEmail1" class="form-label">ID ADMIN</label>
                                        <input name="id_admin" type="text" class="form-control" id="" aria-describedby="IDADMIN" value="{{old('id_admin')}}">
                                        @if($errors->has('id_admin'))
                                        <span class="help-block">{{$errors->first('id_admin')}}</span>
                                        @endif
                                    </div>
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
