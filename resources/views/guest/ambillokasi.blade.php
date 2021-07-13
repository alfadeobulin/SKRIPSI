
<div class = "main">
        <div class="main-content">
            <div class = "container-fluid ">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Marker-->
                        <h1>Selamat Datang Di Dashboard UMKMku</h1>
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
                        </div>
                        <!-- END Marker-->
                    </div>
                </div>
            </div>
        </div>
    </div>