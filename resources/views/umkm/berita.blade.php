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
                                    <h3 class="panel-title">Berita UMKMku</h3>
                                </div>
                                <form class="navbar-form navbar-right" method='GET' action = ''>
                                    <div class="input-group">
                                        <input name="cari" value="" class="form-control" placeholder="Cari . . .">
                                        <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">Cari</button></span>
                                    </div>
                                </form>
                                <div class="panel-body">
                                <button type="button" class="btn btn-primary navbar-left" data-toggle="modal" data-target="#exampleModal">Tambah Data Berita</button>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">JUDUL </th>  
                                            <th scope="col">PENULIS</th>
                                            <th scope="col">ID BERITA</th>
                                            <th scope="col">TANGGAL</th>
                                            <th scope="col">LINK</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($berita as $brt)
                                        <tr>    
                                            <th scope='row'>{{$loop->iteration}}</th>
                                                <td>{{$brt->judul}}</td>
                                                <td>{{$brt->penulis}}</td>
                                                <td>{{$brt->id_berita}}</td>
                                                <td>{{$brt->tgl_terbit}}</td>
                                                <td>{{$brt->link}}</td>
                                                <td>
                                                    <a href="/berita/delete/{{$brt->id_berita}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus berita?')">Delete</a>
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
                            <form action ="/createberita" method="POST"> 
                                @csrf
                                <div class="mb-3">
                                    <div class="form-group {{$errors->has('judul') ? 'has-error' : ''}}">
                                    <label for="exampleInputEmail1" class="form-label">Judul</label>
                                    <input name="judul" type="text" class="form-control" id="InputBerita" aria-describedby="JUDUL" value="{{old('judul')}}">
                                    @if($errors->has('judul'))
                                        <span class="help-block">{{$errors->first('judul')}}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <div class="form-group {{$errors->has('isi') ? 'has-error' : ''}}">   
                                    <label for="editor" class="form-label">Isi</label>
                                    <textarea name="isi" class="form-control" id="editor" rows="10" cols="80" value="{{old('isi')}}"></textarea>
                                    @if($errors->has('isi'))
                                        <span class="help-block">{{$errors->first('isi')}}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <div class="form-group {{$errors->has('penulis') ? 'has-error' : ''}}">
                                    <label for="exampleInputEmail1" class="form-label">Penulis</label>
                                    <input name="penulis" type="text" class="form-control" id="InputPenulis" aria-describedby="PENULIS" value="{{old('penulis')}}">
                                    @if($errors->has('penulis'))
                                        <span class="help-block">{{$errors->first('penulis')}}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <div class="form-group {{$errors->has('tgl_terbit') ? 'has-error' : ''}}">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                                    <input name="tgl_terbit" type="text" class="form-control" id="InputTgl_terbit" aria-describedby="TANGGAL" value="{{old('tgl_terbit')}}">
                                    @if($errors->has('tgl_terbit'))
                                        <span class="help-block">{{$errors->first('tgl_terbit')}}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <div class="form-group {{$errors->has('link') ? 'has-error' : ''}}">
                                    <label for="exampleInputEmail1" class="form-label">Link</label>
                                    <input name="link" type="text" class="form-control" id="InputLink" aria-describedby="LINK" value="{{old('link')}}">
                                    @if($errors->has('link'))
                                        <span class="help-block">{{$errors->first('link')}}</span>
                                    @endif
                                </div>
                                </div>
                                <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit"   class="btn btn-primary" > Tambahkan!</button>
                            </form>
                            <script>
                                CKEDITOR.replace('isi')
                            </script>
            </div>
                </div>
            </div>
    </div>
</div>
@endsection 

@section('ck-editor')
<script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection