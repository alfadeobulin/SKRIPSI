@extends('umkm.chart')

@section('content chart')

<h1>Visualisasi Sebaran UMKM Dengan Open Street Maps</h1>
    <!-- Marker-->
    <!-- html script Maps umkmku CSS nya dipertama -->
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
    <body>
    <div id="mapid" style="height: 400px;"></div>
    <script>
        var mymap = L.map('mapid').setView([ -7.7958508, 110.3422286], 13);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
        }).addTo(mymap);
    </script>
    </body>
    </html> 
    <!-- TABLE KECAMATAN -->
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
                                   
                            </table>
                            </div>
                        </div>
                    <!-- END TABLE KECAMATAN -->
                </div>
            </div>
        </div>
    </div>
</div>

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
                                        
                                    </tbody>
                            </table>
                            </div>
                        </div>
                    <!-- END TABLE KECAMATAN -->
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

