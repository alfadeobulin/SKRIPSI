@extends('umkm.index')

@section('content') 
<div class = "main">
        <div class="main-content">
            <div class = "container-fluid ">
                <div class="row">
                    <div class="col-md-12">
					<div class="panel panel-headline">
						<div class="panel-heading">
                        <h1>Selamat Datang Di Dashboard UMKMku</h1>
                        <div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-shopping-bag"></i></span>
										<p>
											<span class="number">{{$totalData[0]->total}}</span>
											<span class="title">Umkm Terdaftar</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-eye"></i></span>
										<p>
											<span class="number">{{$totalDataMember[0]->total}}</span>
											<span class="title">Member Terdaftar</span>
										</p>
									</div>
								</div>
							</div>
							<div id="umkmkecamatan"></div>
								<div class="main-content">
							<div class = "container-fluid ">
								<div class="chart-container">
							<style>#container {
								width : 1250px;
								height: 50px; 
							}

									.highcharts-figure, .highcharts-data-table table {
										min-width: 320px; 
										max-width: 800px;
										margin: 1em auto;
									}

									.highcharts-data-table table {
										font-family: Verdana, sans-serif;
										border-collapse: collapse;
										border: 1px solid #EBEBEB;
										margin: 10px auto;
										text-align: center;
										width: 100%;
										max-width: 500px;
									}
									.highcharts-data-table caption {
										padding: 1em 0;
										font-size: 1.2em;
										color: #555;
									}
									.highcharts-data-table th {
										font-weight: 600;
										padding: 0.5em;
									}
									.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
										padding: 0.5em;
									}
									.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
										background: #f8f8f8;
									}
									.highcharts-data-table tr:hover {
										background: #f1f7ff;
									}
									</style>
									<!--[if lt IE 9]>
									<script src="https://code.highcharts.com/modules/oldie-polyfills.js"></script>
									<![endif]-->
									<script src="https://polyfill.io/v3/polyfill.js?features=default%2Ces2015%2CElement.prototype.dataset%2CXMLHttpRequest"></script>
									<script src="https://code.highcharts.com/highcharts.js"></script>
									<script src="https://code.highcharts.com/highcharts-more.js"></script>
									<script src="https://code.highcharts.com/modules/exporting.js"></script>
									<script src="https://code.highcharts.com/modules/export-data.js"></script>
									<script src="https://code.highcharts.com/modules/accessibility.js"></script>

										<div id="container" data-highcharts-chart="0" role="region" aria-label="Chart.update. Highcharts interactive chart." aria-hidden="false" style="overflow: hidden;"><div id="highcharts-screen-reader-region-before-0" aria-label="Chart screen reader information, Chart.update." role="region" aria-hidden="false" style="position: relative;"><div aria-hidden="false" style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;">
										<path fill="none" class="highcharts-label-box highcharts-tooltip-box highcharts-shadow" d="M 3.5 0.5 L 116.5 0.5 C 119.5 0.5 119.5 0.5 119.5 3.5 L 119.5 44.5 C 119.5 47.5 119.5 47.5 116.5 47.5 L 65.5 47.5 L 59.5 53.5 L 53.5 47.5 L 3.5 47.5 C 0.5 47.5 0.5 47.5 0.5 44.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#000000" stroke-opacity="0.049999999999999996" stroke-width="5" transform="translate(1, 1)"></path><path fill="none" class="highcharts-label-box highcharts-tooltip-box highcharts-shadow" d="M 3.5 0.5 L 116.5 0.5 C 119.5 0.5 119.5 0.5 119.5 3.5 L 119.5 44.5 C 119.5 47.5 119.5 47.5 116.5 47.5 L 65.5 47.5 L 59.5 53.5 L 53.5 47.5 L 3.5 47.5 C 0.5 47.5 0.5 47.5 0.5 44.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#000000" stroke-opacity="0.09999999999999999" stroke-width="3" transform="translate(1, 1)"></path><path fill="none" class="highcharts-label-box highcharts-tooltip-box highcharts-shadow" d="M 3.5 0.5 L 116.5 0.5 C 119.5 0.5 119.5 0.5 119.5 3.5 L 119.5 44.5 C 119.5 47.5 119.5 47.5 116.5 47.5 L 65.5 47.5 L 59.5 53.5 L 53.5 47.5 L 3.5 47.5 C 0.5 47.5 0.5 47.5 0.5 44.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#000000" stroke-opacity="0.15" stroke-width="1" transform="translate(1, 1)"></path><path fill="rgba(247,247,247,0.85)" class="highcharts-label-box highcharts-tooltip-box" d="M 3.5 0.5 L 116.5 0.5 C 119.5 0.5 119.5 0.5 119.5 3.5 L 119.5 44.5 C 119.5 47.5 119.5 47.5 116.5 47.5 L 65.5 47.5 L 59.5 53.5 L 53.5 47.5 L 3.5 47.5 C 0.5 47.5 0.5 47.5 0.5 44.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#f45b5b" stroke-width="1"></path><text x="8" data-z-index="1" y="18" style="color:#333333;font-size:12px;fill:#333333;"><tspan style="font-size: 10px">Sep</tspan><tspan class="highcharts-br" dy="15" x="8">​</tspan><tspan style="fill:#f45b5b">●</tspan> Series 1: <tspan style="font-weight:bold;">216.4</tspan><tspan class="highcharts-br">​</tspan></text></g></svg><div class="highcharts-a11y-proxy-container" aria-hidden="false"><div aria-label="Chart menu, Chart.update" role="region" aria-hidden="false"><button aria-label="View chart menu" aria-expanded="false" class="highcharts-a11y-proxy-button highcharts-no-tooltip" aria-hidden="false" style="border-width: 0px; background-color: transparent; cursor: pointer; outline: none; opacity: 0.001; z-index: 999; overflow: hidden; padding: 0px; margin: 0px; display: block; position: absolute; width: 24px; height: 22px; left: 622px; top: 11px;"></button></div></div></div><div id="highcharts-screen-reader-region-after-0" aria-label="" aria-hidden="false" style="position: relative;"><div aria-hidden="false" style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;"><div id="highcharts-end-of-chart-marker-0" class="highcharts-exit-anchor" tabindex="0" aria-hidden="false">End of interactive chart.</div></div></div></div>
									</figure>
									<!--[if lt IE 9]>
									<script src="https://code.highcharts.com/modules/oldie.js"></script>
									<![endif]-->

									<script defer="" type="text/javascript">
											var categories = <?php echo json_encode($categories) ?>;
												Highcharts.chart('umkmkecamatan', {
													chart: {
														type: 'column'
													},
													title: {
															text: 'UMKM Berdasarkan Kecamatan'
														},
														subtitle: {
															text: 'Grafik UMKM berdasarkan kecamatan'
														},
													credits: {
														enabled: false
													},
													accessibility: {
														announceNewData: {
															enabled: true
														}
													},
													xAxis: {
														type: 'category'
													},
													yAxis: {
														title: {
															text: 'Jumlah UMKM'
														}
													},
													legend: {
														enabled: false
													},
													plotOptions: {
														series: {
															borderWidth: 0,
															dataLabels: {
																enabled: true,
															}
														}
													},
													tooltip: {
														headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
														pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>'
													},
													series: [{
														name: "UMKM",
														colorByPoint: true,
														data: categories
													}],
												});
												</script>
												</div>
												<!-- END Marker-->
											</div>
										</div>
									</div>
								</div>
							</div>
                        <!-- END Marker-->
                    </div>
                </div>
                @yield('content visual')
            </div>
        </div>
    </div>
@endsection



