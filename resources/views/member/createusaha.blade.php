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
                        <div class="row">
                            <div class="col-lg-12">
                            <form action ="/createusaha" method="POST">
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
                                    <label for="exampleInputEmail1" class="form-label">ID MEMBER</label>
                                    <input name="id_member" type="text" class="form-control" aria-describedby="Latitude" >
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ID KELURAHAN</label>
                                    <input name="id_kel" type="text" class="form-control"  aria-describedby="ID Kelurahan" >
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ID KECAMATAN</label>
                                    <input name="id_kec" type="text" class="form-control"  aria-describedby="ID Kecamatan" >
                                </div>
                                <button type="submit" class="btn btn-warning">TAMBAHKAN</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endsection 