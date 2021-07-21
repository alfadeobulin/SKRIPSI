<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> Maps - Sebaran Wilayah</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/">UMKMku</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/lihatberita">Berita</a></li>
                        <li class="nav-item"><a class="nav-link" href="/lihatumkm">UMKM Terdaftar</a></li>
                        <li class="nav-item"><a class="nav-link" href="/lihatgaleri">Galeri</a></li>
                        <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Sebaran Wilayah Terdaftar</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Peta pesebaran UMKMku</p>
                </div>
            </div>
        </header>
        <div class = "main">
                <div class="main-content">
                    <div class = "container-fluid ">
                        <div class="row">
                            <div class="col-md-12">
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
                                    <script>"https://code.jquery.com/jquery-3.6.0.min.js"</script> 
                                </head>
                                <body>
                                <div id="mapid" style="height: 500px;"></div>
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
                                    L.marker([-7.7958508, 110.3422286]).addTo(mymap);
                                    
                                    $( document ).ready(function(LihatUmkm) {
                                        $.getJSON('titik/json', function(data){
                                        $.each(data, function(LihatMaps){
                                        L.marker([parseFloat(data[LihatMaps].longitude), parseFloat(data[LihatMaps].latitude)]).addTo(mymap);
                                        });
                                    });
                                    });
                                </script>
                                </body>
                                </html> 
                                </div>
                                <!-- END Marker-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-light py-5">
                <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2021 - UMKM Daerah Istimewa Yogyakarta</div></div>
            </footer>
