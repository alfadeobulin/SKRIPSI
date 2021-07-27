
@extends('wilayah.overview')

@section('content visual')
<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Detail Informasi UMKMku</h3>
							<p class="panel-subtitle">UMKM Kota Yogyakarta </p>
						</div>							
					<!-- END OVERVIEW -->
					<div class="row">
						<div class="col-md-6">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Kecamatan Terdaftar </h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">
									<table class="table table-striped">
										<thead>
											<tr>
                                                <th>ID KECAMATAN</th>
                                                <th>KECAMATAN</th>
                                                <th>STATUS</th>
                                            </tr>
										</thead>
                                        @foreach ($kecamatan as $kec)
										<tbody>
											<tr>
                                                <td>{{$kec->id_kec}}</td>
                                                <td>{{$kec->nama_kec}}</td>
                                                <td><span class="label label-success">Terdaftar</span></td>
                                            </tr>
										</tbody>
                                        @endforeach
									</table>
                                    <br/>
                                    Halaman : {{ $kecamatan->currentPage() }} <br/>
                                    Jumlah Data : {{ $kecamatan->total() }} <br/>
                                    Data Per Halaman : {{ $kecamatan->perPage() }} <br/>
                                    {{ $kecamatan->links() }}
								</div>
								<!-- <div class="panel-footer">
									<div class="row">
										<div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 24 hours</span></div>
										<div class="col-md-6 text-right"><a href="" class="btn btn-primary">Lihat Seluruh Kecamatan</a></div>
									</div>
								</div> -->
							</div>
							<!-- END RECENT PURCHASES -->
						</div>
						<div class="col-md-6">
							<!-- MULTI CHARTS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Kelurahan Terdaftar</h3>
                                    <div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">
									<table class="table table-striped">
										<thead>
											<tr>
                                                <th>ID KELURAHAN</th>
                                                <th>KELURAHAN</th>
                                                <th>STATUS</th>
                                            </tr>
										</thead>
                                        @foreach ($kelurahan as $kel)
										<tbody>
											<tr>
                                                <td>{{$kel->id_kel}}</td>
                                                <td>{{$kel->nama_kel}}</td>
                                                <td><span class="label label-success">Terdaftar</span></td>
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
							<!-- END MULTI CHARTS -->
						</div>
					</div>

@endsection

