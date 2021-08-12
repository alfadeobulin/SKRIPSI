@extends('umkm.index')

@section('content')
<!DOCTYPE html> 
<html>
<head>
    <title>Maps Pesebaran Umkm</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>   
</head>
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
                                    <h3 class="panel-title">Form Pendaftaran Usaha</h3>
                                </div>
                                <div class="panel-body text-wrap">
                                     <div class="panel-body">
                                    <table class="table table-hover">
                                        <form action ="/usaha/store" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <div class="form-group {{$errors->has('id_usaha') ? 'has-error' : ''}}">
                                            <label for="id_usaha" class="form-label">ID USAHA</label>
                                            <input name="id_usaha" type="text" class="form-control"  aria-describedby="ID Usaha" value="{{old('id_usaha')}}">
                                            @if($errors->has('id_usaha'))
                                            <span class="help-block">{{$errors->first('id_usaha')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group {{$errors->has('nama_ush') ? 'has-error' : ''}}">
                                            <label for="Nama Usaha" class="form-label">NAMA USAHA</label>
                                            <input name="nama_ush" type="text" class="form-control" aria-describedby="Nama Usaha" value="{{old('nama_ush')}}">
                                            @if($errors->has('nama_ush'))
                                            <span class="help-block">{{$errors->first('nama_ush')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group {{$errors->has('alamat_ush') ? 'has-error' : ''}}">
                                            <label for="exampleInputEmail1" class="form-label">ALAMAT</label>
                                            <textarea name="alamat_ush" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{old('alamat_ush')}}"></textarea>
                                            @if($errors->has('alamat_ush'))
                                            <span class="help-block">{{$errors->first('alamat_ush')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group {{$errors->has('ket_ush') ? 'has-error' : ''}}">
                                            <label for="exampleInputEmail1" class="form-label">KETERANGAN</label>
                                            <textarea name="ket_ush" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{old('ket_ush')}}"></textarea>
                                            @if($errors->has('ket_ush'))
                                            <span class="help-block">{{$errors->first('ket_ush')}}</span>
                                            @endif
                                        </div>
                                        <body>
                                        <div id="mapid" style="height: 400px;"></div>
                                        <script>
                                            var mymap = L.map('mapid').setView([ -7.7822073, 110.3705015], 13);
                                            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                                            maxZoom: 18,
                                            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                                                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                            id: 'mapbox/streets-v11',
                                            tileSize: 512,
                                            zoomOffset: -1
                                            }).addTo(mymap);
                                            //ambil koordinat
                                            var latinput = document.querySelector("[name=latitude]");
                                            var lnginput = document.querySelector("[name=longitude]");

                                            var curLocation = [-7.7822073, 110.3705015];
                                            mymap.attributionControl.setPrefix(false);
                                            var marker = new L.Marker(curLocation, {
                                                draggable:'true'
                                            }); 
                                            marker.on('dragend', function (event) {
                                                var position = marker.getLatLng();
                                                marker.setLatLng(position, {
                                                    draggable: 'true'
                                                }).bindPopup(position).update();
                                                $("#latitude").val(position.lat);
                                                $("#longitude").val(position.lng);
                                            });
                                            mymap.addLayer(marker);
                                            
                                            mymap.on("click", function(e) {
                                               var lat = e.latlng.lat;
                                               var lat = e.latlng.lng;
                                               if (!marker) { 
                                                    marker = L.marker(e.latlng).addTo(mymap);
                                               } 
                                               else {
                                                   marker.setLatLng(e.latlng);
                                               }
                                               latInput.value = lat;
                                               lngInput.value = lng;
                                            });
                                        </script>
                                        </body>
                                        <div class="form-group">
                                            <div class="form-group {{$errors->has('longitude') ? 'has-error' : ''}}">
                                            <label for="exampleInputEmail1" class="form-label">LONGITUDE</label>
                                            <input name="longitude" type="text" id="longitude" class="form-control"  aria-describedby="Longitude" value="{{old('longitude')}}" readonly> 
                                            @if($errors->has('longitude'))
                                            <span class="help-block">{{$errors->first('longitude')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group {{$errors->has('latitude') ? 'has-error' : ''}}">
                                            <label for="exampleInputEmail1" class="form-label">LATITUDE</label>
                                            <input name="latitude" type="text" id="latitude" class="form-control"  aria-describedby="Latitude" value="{{old('latitude')}}" readonly>
                                            @if($errors->has('latitude'))
                                            <span class="help-block">{{$errors->first('latitude')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group {{$errors->has('id_member') ? 'has-error' : ''}}">
                                            <label for="exampleInputEmail1" class="form-label">ID MEMBER</label>
                                            <input name="id_member" type="text" class="form-control" aria-describedby="ID Member" value="{{old('id_member')}}">
                                            @if($errors->has('id_member'))
                                            <span class="help-block">{{$errors->first('id_member')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group {{$errors->has('id_kel') ? 'has-error' : ''}}">
                                            <label for="exampleInputEmail1" class="form-label">KELURAHAN</label>
                                            <input name="id_kel" type="text" class="form-control"  aria-describedby="ID Kelurahan" value="{{old('id_kel')}}">
                                            @if($errors->has('id_kel'))
                                            <span class="help-block">{{$errors->first('id_kel')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1" class="form-label">PILIH KELURAHAN</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1" class="form-label" >PILIH KECAMATAN</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group {{$errors->has('id_kec') ? 'has-error' : ''}}">
                                            <label for="exampleInputEmail1" class="form-label">KECAMATAN</label>
                                            <input name="id_kec" type="text" class="form-control"  aria-describedby="ID Kecamatan" value="{{old('id_kec')}}">
                                            @if($errors->has('id_kec'))
                                            <span class="help-block">{{$errors->first('id_kec')}}</span>
                                            @endif
                                        </div>
                                            <button type="submit" class="btn btn-primary btn-warning">TAMBAHKAN</button>
                                        </form>
                                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</html>
@endsection 
