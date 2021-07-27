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
                                    <h3 class="panel-title">Kelurahan Terdaftar</h3>
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
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Tambah Kelurahan</button>
                                @endif
                                <div class="panel-body">
                                <table class="table table-hover">
										<thead>
											<tr>
                                                <th>ID KELURAHAN</th>
                                                <th>KELURAHAN</th>
                                                <th>STATUS</th>
                                                <th></th>
                                            </tr>
										</thead>
                                        @foreach ($kelurahan as $kel)
										<tbody>
											<tr>
                                                <td>{{$kel->id_kel}}</td>
                                                <td>{{$kel->nama_kel}}</td>
                                                <td><span class="label label-success">Terdaftar</span></td>
                                                <td>
                                                    @if (auth()->user()->role == 'admin')
                                                        <a href="/kelurahan/delete/{{$kel->id_kel}}" class="btn btn-danger btn-sm" onclick=" return confirm('Yakin ingin menghapus data?')">Delete</a>
                                                    @endif
                                                </td>    
                                            </tr>
										</tbody>
                                        @endforeach
									</table>
                                    <br/>
                                    Halaman : {{ $kelurahan->currentPage() }} <br/>
                                    Jumlah Data : {{ $kelurahan->total() }} <br/>
                                    Data Per Halaman : {{ $kelurahan->perPage() }} <br/>
                                    {{ $kelurahan->links() }}
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kelurahan</h5>
                            <div class="modal-body">
                            <form action ="/createkelurahan" method="POST" enctype="multipart/form-data"> 
                                @csrf
                                <div class="mb-3">
                                    <div class="form-group {{$errors->has('id_kel') ? 'has-error' : ''}}">
                                    <label for="exampleInputEmail1" class="form-label">ID Kelurahan</label>
                                    <input name="id_kel" type="text" class="form-control" id="id_kel" aria-describedby="ID Kelurahan" value="{{old('id_kel')}}">
                                    @if($errors->has('id_kel'))
                                    <span class="help-block">{{$errors->first('id_kel')}}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <div class="form-group {{$errors->has('nama_kel') ? 'has-error' : ''}}">
                                    <label for="exampleInputEmail1" class="form-label">Nama Kelurahan</label>
                                    <input name="nama_kel" type="text" class="form-control" id="nama_kel" aria-describedby="Nama Kelurahan" value="{{old('nama_kel')}}">
                                    @if($errors->has('nama_kel'))
                                    <span class="help-block">{{$errors->first('nama_kel')}}</span>
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
