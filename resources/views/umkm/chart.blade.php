@extends('umkm.index')

@section('content')
    <div class = "main">
        <div class="main-content">
            <div class = "container-fluid ">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Marker-->
                        <h1>Selamat Datang di UMKMku</h1>
                        <!-- html script chart umkmku -->
                        <div class="chart-container " >
                        <style>.highcharts-figure, .highcharts-data-table table 
                            {
                                min-width: 320px; 
                                max-width: 660px;
                                margin: 1em auto;
                            }

                            .highcharts-data-table table 
                            {
                                font-family: Verdana, sans-serif;
                                border-collapse: collapse;
                                border: 1px solid #EBEBEB;
                                margin: 10px auto;
                                text-align: center;
                                width: 100%;
                                max-width: 500px;
                            }
                            .highcharts-data-table caption 
                            {
                                padding: 1em 0;
                                font-size: 1.2em;
                                color: #555;
                            }
                            .highcharts-data-table th 
                            {
                                font-weight: 600;
                                padding: 0.5em;
                            }
                            .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption 
                            {
                                padding: 0.5em;
                            }
                            .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) 
                            {
                                background: #f8f8f8;
                            }
                            .highcharts-data-table tr:hover 
                            {
                                background: #f1f7ff;
                            }
                        </style>
                        <script src="https://polyfill.io/v3/polyfill.js?features=default%2Ces2015%2CElement.prototype.dataset%2CXMLHttpRequest" type="text/javascript"></script>
                        <script src="https://code.highcharts.com/highcharts.js" type="text/javascript"></script>
                        <script src="https://code.highcharts.com/modules/exporting.js" type="text/javascript"></script>
                        <script src="https://code.highcharts.com/modules/export-data.js" type="text/javascript"></script>
                        <script src="https://code.highcharts.com/modules/accessibility.js" type="text/javascript"></script>
                        <figure class="highcharts-figure">
                            <div id="container" data-highcharts-chart="0" role="region" aria-label="Sebaran UMKM D.I.Y yang terdaftar di UMKMku" aria-hidden="false" style="overflow: hidden;"><div id="highcharts-screen-reader-region-before-0" aria-label="Chart screen reader information." role="region" aria-hidden="false" style="position: relative;"><div aria-hidden="false" style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;"><p>Sebaran UMKM D.I.Y yang terdaftar di UMKMku</p><div>Pie chart with 6 slices.</div><div>
                            <p class="highcharts-description highcharts-linked-description" aria-hidden="true">
                            </p>
                        </figure>
                        <script type="text/javascript">

                        "use strict";

                        // Radialize the colors
                        Highcharts.setOptions({
                        colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
                            return {
                            radialGradient: {
                                cx: 0.5,
                                cy: 0.3,
                                r: 0.7
                            },
                            stops: [[0, color], [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                            ]
                            };
                        })
                        }); // Build the chart

                        Highcharts.chart('container', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: 'Sebaran UMKM yang terdaftar di UMKMku'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        accessibility: {
                            point: {
                            valueSuffix: '%'
                            }
                        },
                        plotOptions: {
                            pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                connectorColor: 'silver'
                            }
                            }
                        },
                        series: 
                        [{
                            name: 'Percentage',
                            data: [{
                            name: 'Seturan Raya',
                            y: 45.41
                            }, {
                            name: 'Kalasan',
                            y: 11.84
                            }, {
                            name: 'Gondokusuman',
                            y: 10.85
                            }, {
                            name: 'Gondomanan',
                            y: 4.67
                            }, {
                            name: 'Cangkringan',
                            y: 4.18
                            }, {
                            name: 'Pakualaman',
                            y: 7.05
                            }]
                        }]
                        });

                        
                        </script>
                         </div>
                        <!-- END Marker-->
                    </div>
                </div>
                @yield('content chart')
            </div>
        </div>
    </div>
   
@endsection