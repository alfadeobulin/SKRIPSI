<!doctype html>
<html lang="en">

<head>
	<title>@yield('UMKM Daerah Istimewa Yogyakarta')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('admin/assets/img/favicon.png')}}">
	
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="/"><img src="{{asset('admin/umkmku.png')}}" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						
						@if (auth()->user())
						<li class="dropdown">
							<a href="" class="dropdown-toggle" data-toggle="dropdown"><img src='{{asset("uploads/avatar/". auth()->user()->member["avatar"])}}' class="img-circle" alt="avatar"> <span>{{Auth::user()->name}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="{{asset('/user/profile/'.Auth::user()->id)}}"><i class="lnr lnr-user"></i> <span>Akun</span></a></li>
								<li><a href="{{'/logout'}}"><i class=" lnr lnr-exit"></i><span>Logout</span></a></li>
								@endif
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="{{url('/dashboard')}}" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>Kelola</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
								@if (auth()->user()->role == 'member')
								<li><a href="{{asset('/profilemember/profile/'.Auth::user()->id_users)}}" class="">Profil</a></li>
								@endif
								@if (auth()->user()->role == 'admin')
									<li><a href="{{url('/daftarmemberumkm')}}" class="">Daftar Member UMKMku</a></li>
								@endif
								@if (auth()->user()->role == 'superadmin')
									<li><a href="{{url('/daftarmemberumkm')}}" class="">Daftar Member UMKMku</a></li>
									<li><a href="{{url('/daftaradmin')}}" class="">Admin Terdaftar</a></li>
								@endif
								@if (auth()->user()->role == 'member')
									<li><a href="{{url('/umkm')}}" class="">Usaha</a></li>
								@else
									<li><a href="{{url('/umkmmember')}}" class="">Usaha Member</a></li>
								@endif
								</ul>
							</div>
						</li>
						<li><a href="{{url('/galeri')}}" class=""><i class="fa fa-shopping-bag"></i> <span>Galeri UMKM</span></a></li>
						@if (auth()->user()->role == 'admin')
						<li><a href="{{url('/berita')}}" class=""><i class="lnr lnr-file-empty"></i> <span>Berita</span></a></li>
						@endif
						<!-- <li>
							<a href="#Pages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-map-marker"></i> <span>Wilayah</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="Pages" class="collapse ">
								<ul class="nav">
									<li><a href="{{url('/kecamatan')}}" class="">Kecamatan</a></li>
									<li><a href="{{url('/kelurahan')}}" class="">Kelurahan</a></li>
									<li><a href="{{url('/sebaranumkm')}}" class="">Peta Sebaran </a></li>
									
								</ul>
							</div>
						</li> -->
						<li><a href="{{url('/informasi')}}" class=""><i class="fa fa-map"></i> <span>Informasi</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		
		<!-- END MAIN -->

		<footer>
			<div class="container-fluid">
				<p class="copyright">UMKM Kota Yogyakarta <i class="fa fa-love"></i><a href="https://diskopukm.jogjaprov.go.id/dinas/">DISKOPUKMDIY</a></p>
			</div>
		</footer>
		@yield('content')
		@yield('ck-editor')
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{asset('admin/assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('admin/assets/scripts/klorofil-common.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/ckeditor/ckeditor/ckeditor.js')}}"></script>
	<script src="[ckeditor-build-path]/ckeditor.js"></script>

</body>

</html>