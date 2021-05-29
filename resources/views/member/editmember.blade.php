
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
                                    <h3 class="panel-title">Edit Profile</h3>
                                    <div class="panel-body">
                                        <form action ="/daftarmemberumkm/update/{{$member->id_member}}" method="POST" enctype="multipart/form-data"> 
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">ID Member</label>
                                                <input name="id_member" type="text" class="form-control" id="" aria-describedby="IDMEMBER" value="{{$member->id_member}}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Nama </label>
                                                <input name="nama_member" type="text"  class="form-control" id="" aria-describedby="NAMA" value="{{$member->nama_member}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">NO Hp</label>
                                                <input name="nohp_member" type="text" class="form-control" id="" aria-describedby="EMAIL" value="{{$member->nohp_member}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                                <textarea name="alamat_member" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$member->alamat_member}}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Foto Profil</label>
                                                <input name="avatar" type="file" class="form-control" id="" aria-describedby="AVATAR" value="{{$member->avatar}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">ID ADMIN</label>
                                                <input name="id_admin" type="text" class="form-control" id="" aria-describedby="IDADMIN" value="{{$member->id_admin}}" readonly>
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