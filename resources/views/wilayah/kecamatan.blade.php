@extends('umkm.index')

@section('content kecamatan')

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
                                <h3 class="panel-title">KECAMATAN TERDAFTAR</h3>
                            </div>
                            <div class="panel-body">
                            <button type="button" class="btn btn-primary navbar-left" data-toggle="modal" data-target="#exampleModal">Tambah Data Kecamatan</button>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">ID KECAMATAN </th>
                                        <th scope="col">NAMA KECAMATAN</th>      
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kecamatan as $kec)
                                        <tr>    
                                            <th scope='row'>{{$loop->iteration}}</th>
                                                <td>{{$kec->id_kec}}</td>
                                                <td>{{$kec->nama_kec}}</td>
                                                <td>
                                                    <a href="/kecamatan/delete/{{$kec->id_kec}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kecamatan terdaftar?')">Delete</a>
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
    @yield('content kecamatan')
</div>
@endsection 
