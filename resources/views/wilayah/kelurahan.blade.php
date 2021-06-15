@extends('umkm.index')

@section('content ')
<div class="main-content">
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">{{session('sukses')}}</div>
    @endif
        <div class = "container-fluid ">
            <div class="row">
                <div class="col-md-6">
  
                    <!-- TABLE HOVER -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">KELURAHAN TERDAFTAR</h3>
                            </div>
                            <div class="panel-body">
                            <button type="button" class="btn btn-primary navbar-left" data-toggle="modal" data-target="#exampleModal">Tambah Data Kelurahan</button>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">ID KELURAHAN </th>
                                        <th scope="col">NAMA KELURAHAN</th>      
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kelurahan as $kel)
                                        <tr>    
                                            <th scope='row'>{{$loop->iteration}}</th>
                                                <td>{{$kel->id_kel}}</td>
                                                <td>{{$kel->nama_kel}}</td>
                                                <td>{{$kel->id_kec}}</td>
                                                <td>
                                                    <a href="/kelurahan/delete/{{$kel->id_kel}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kelurahan terdaftar?')">Delete</a>
                                                </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    <!-- END TABLE KECAMATAN -->
                </div>
            </div>
        </div>
    </div>
    @yield('content kelurahan')
</div>
@endsection 