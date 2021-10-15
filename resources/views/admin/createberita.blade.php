@extends('umkm.index')

@section('content')
@if(session('sukses'))
        <div class="alert alert-success" role="alert">{{session('sukses')}}</div>
        @endif
        <div class="main">
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Form Unggah Berita</h3>
                                </div>
                                <div class="panel-body text-wrap">
                                     <div class="panel-body">
                                    <table class="table table-hover">  
                                        <form action ="/news/store" method="POST"> 
                                            @csrf
                                            <div class="form-group">
                                                <div class="form-group {{$errors->has('judul') ? 'has-error' : ''}}">
                                                <label for="exampleInputEmail1" class="form-label">Judul</label>
                                                <input name="judul" type="text" class="form-control" id="InputBerita" aria-describedby="JUDUL" value="{{old('judul')}}">
                                                @if($errors->has('judul'))
                                                    <span class="help-block">{{$errors->first('judul')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group {{$errors->has('isi') ? 'has-error' : ''}}">   
                                                <label for="editor" class="form-label">Isi</label>
                                                <textarea name="isi" class="form-control" id="editor" rows="10" cols="80" value="{{old('isi')}}" ></textarea>
                                                @if($errors->has('isi'))
                                                    <span class="help-block">{{$errors->first('isi')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group {{$errors->has('penulis') ? 'has-error' : ''}}">
                                                <label for="exampleInputEmail1" class="form-label">Penulis</label>
                                                <input name="penulis" type="text" class="form-control" id="InputPenulis" aria-describedby="PENULIS" value="{{old('penulis')}}">
                                                @if($errors->has('penulis'))
                                                    <span class="help-block">{{$errors->first('penulis')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group {{$errors->has('tgl_terbit') ? 'has-error' : ''}}">
                                                <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                                                <input name="tgl_terbit" type="text" class="form-control" id="InputTgl_terbit" aria-describedby="TANGGAL" placeholder ="YYYY-MM-DD"value="{{old('tgl_terbit')}}">
                                                @if($errors->has('tgl_terbit'))
                                                    <span class="help-block">{{$errors->first('tgl_terbit')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group {{$errors->has('link') ? 'has-error' : ''}}">
                                                <label for="exampleInputEmail1" class="form-label">Link</label>
                                                <input name="link" type="text" class="form-control" id="InputLink" aria-describedby="LINK" value="{{old('link')}}">
                                                @if($errors->has('link'))
                                                    <span class="help-block">{{$errors->first('link')}}</span>
                                                @endif
                                            </div>
                                            </div>
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