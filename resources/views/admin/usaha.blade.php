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
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Tambah Data Member</button>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">NO</th>
                                                <th scope="col">ID USAHA </th>
                                                <th scope="col">NAMA USAHA</th>   
                                                <th scope="col">ALAMAT USAHA</th>
                                                <th scope="col">KETERANGAN</th>
                                                <th scope="col">LONGITUDE</th>
                                                <th scope="col">LATITUDE</th>
                                                <th scope="col">ID MEMBER</th>
                                                <th scope="col">ID ADMIN</th>
                                                <th scope="col">ID KELURAHAN</th>
                                                <th scope="col">ID KECAMATAN</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($usaha as $ush)
                                            <tr>    
                                                <th scope='row'>{{$loop->iteration}}</th>
                                                    <td>{{$ush->id_usaha}}</td>
                                                    <td>{{$ush->nama_ush}}</td>
                                                    <td>{{$ush->alamat_ush}}</td>
                                                    <td>{{$ush->ket_ush}}</td>
                                                    <td>{{$ush->longitude}}</td>
                                                    <td>{{$ush->latitude}}</td>
                                                    <td>{{$ush->id_member}}</td>
                                                    <td>{{$ush->id_admin}}</td>
                                                    <td>{{$ush->id_kel}}</td>
                                                    <td>{{$ush->id_kec}}</td>
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