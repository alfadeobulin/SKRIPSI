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
											<span class="number">4</span>
											<span class="title">Umkm Terdaftar</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-eye"></i></span>
										<p>
											<span class="number">106</span>
											<span class="title">Jumlah Kunjungan</span>
										</p>
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


