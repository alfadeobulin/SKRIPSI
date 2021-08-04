@extends('umkm.index')

@section('content')
    <!-- Tabel USAHA keseluruhan-->
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
                                    <h3 class="panel-title">Daftar Usaha Member UMKMku</h3>
                                </div>
                                <div class="panel-body text-wrap">
                                <form class="navbar-form navbar-right" method='GET' action = ''>
                                    <div class="input-group">
                                        <input name="cari" value="" class="form-control" placeholder="Cari . . .">
                                        <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">Cari</button></span>
                                    </div>
                                </form>
                                </div>
                                <div class="panel-body text-wrap" >
                                    @if (auth()->user()->role == 'admin')
                                    <a href="/umkm/exportpdf" class="btn btn-danger btn-sm fa fa-download">PDF</a>
                                    <a href="/umkm/exportexcel" class="btn btn-success btn-sm fa fa-download ">Excel</a>
                                    @endif
                                    @if (auth()->user()->role == 'member')
                                    <a href="/usaha/create" class="btn btn-default fa fa-upload">Buat Usaha</a>
                                    @endif
                                </div>
                                <div class="panel-body text-wrap" >
                                    <table id="table-datatables" class="table table-hover">
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
                                                    <td>{{$ush->id_kel}}</td>
                                                    <td>{{$ush->id_kec}}</td>
                                                    <td>
                                                    @if (auth()->user()->role == 'admin')
                                                        <a href="/umkm/delete/{{$ush->id_usaha}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">Delete</a>
                                                    @endif
                                                    @if (auth()->user()->role == 'member')
                                                    <a href="/umkm/edit/{{$ush->id_usaha}}" class="btn btn-warning btn-sm">Edit Usaha</a>
                                                    @endif
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