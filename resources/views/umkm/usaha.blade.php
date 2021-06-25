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
                                <form class="navbar-form navbar-right" method='GET' action = ''>
                                    <div class="input-group">
                                        <input name="cari" value="" class="form-control" placeholder="Cari . . .">
                                        <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">Cari</button></span>
                                    </div>
                                </form>
                                <div class="panel-body text-wrap">
                                @if (auth()->user()->role == 'member')
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Tambah UMKM</button>
                                @endif
                                <div class="panel-body">
                                <!-- <a href="createusaha" class = "btn btn-primary">Tambah Data Usaha</a> -->
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah berita</h5>
                            <div class="modal-body">
                            <form action ="/createusaha" method="POST" > 
                                @csrf
                                <div class="mb-3">
                                    <label for="id_usaha" class="form-label">ID USAHA</label>
                                    <input name="id_usaha" type="text" class="form-control"  aria-describedby="ID Usaha" >
                                </div>
                                <div class="mb-3">
                                    <label for="Nama Usaha" class="form-label">NAMA USAHA</label>
                                    <input name="nama_ush" type="text" class="form-control" aria-describedby="Nama Usaha" >
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ALAMAT</label>
                                    <textarea name="alamat_ush" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">KETERANGAN</label>
                                    <textarea name="ket_ush" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">LONGITUDE</label>
                                    <input name="longitude" type="text" class="form-control"  aria-describedby="Longitude" >
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">LATITUDE</label>
                                    <input name="latitude" type="text" class="form-control"  aria-describedby="Latitude" >
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ID MEMBER</label>
                                    <input name="id_member" type="text" class="form-control" aria-describedby="ID Member" >
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ID KELURAHAN</label>
                                    <input name="id_kel" type="text" class="form-control"  aria-describedby="ID Kelurahan" >
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ID KECAMATAN</label>
                                    <input name="id_kec" type="text" class="form-control"  aria-describedby="ID Kecamatan" >
                                </div>
                                <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit"   class="btn btn-primary" > Tambahkan!</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 