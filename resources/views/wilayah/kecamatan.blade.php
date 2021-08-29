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
                                    <h3 class="panel-title">Kecamatan Terdaftar</h3>
                                </div>
                                <!-- <form class="navbar-form navbar-right" method='GET' action = ''>
                                    <div class="input-group">
                                        <input name="cari" value="" class="form-control" placeholder="Cari . . .">
                                        <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">Cari</button></span>
                                    </div>
                                </form> -->
                                <div class="panel-body text-wrap">
                                @if (auth()->user()->role == 'admin')
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Tambah Kecamatan</button>
                                @endif
                                <div class="panel-body">
                                <table class="table table-hover">
										<thead>
											<tr>
                                                <th>KECAMATAN</th>
                                                <th>STATUS</th>
                                                <th></th>
                                            </tr>
										</thead>
                                        @foreach ($kecamatan as $kec)
										<tbody>
											<tr>
                                                <td>{{$kec->nama_kec}}</td>
                                                <td><span class="label label-success">Terdaftar</span></td>
                                                <td>
                                                    @if (auth()->user()->role == 'admin')
                                                        <a href="/kecamatan/delete/{{$kec->id_kec}}" class="btn btn-danger btn-sm" onclick=" return confirm('Yakin ingin menghapus data?')">Delete</a>
                                                    @endif
                                                </td>    
                                            </tr>
										</tbody>
                                        @endforeach
									</table>
                                    <br/>
                                    Halaman : {{ $kecamatan->currentPage() }} <br/>
                                    Jumlah Data : {{ $kecamatan->total() }} <br/>
                                    Data Per Halaman : {{ $kecamatan->perPage() }} <br/>
                                    {{ $kecamatan->links() }}
								</div>
                                </div>
                        </div>
                    <!-- END TABLE KECAMATAN -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Galeri</h5>
                            <div class="modal-body">
                            <form action ="/createkecamatan" method="POST" enctype="multipart/form-data"> 
                                @csrf
                                <div class="mb-3">
                                    <div class="form-group {{$errors->has('id_kec') ? 'has-error' : ''}}">
                                    <label for="exampleInputEmail1" class="form-label">ID Kecamatan</label>
                                    <input name="id_kec" type="text" class="form-control" id="id_kec" aria-describedby="ID Kecamatan" value="{{old('id_kec')}}">
                                    @if($errors->has('id_kec'))
                                    <span class="help-block">{{$errors->first('id_kec')}}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <div class="form-group {{$errors->has('nama_kec') ? 'has-error' : ''}}">
                                    <label for="exampleInputEmail1" class="form-label">Nama Kecamatan</label>
                                    <input name="nama_kec" type="text" class="form-control" id="nama_kec" aria-describedby="Nama Kecamatan" value="{{old('nama_kec')}}">
                                    @if($errors->has('nama_kec'))
                                    <span class="help-block">{{$errors->first('nama_kec')}}</span>
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
