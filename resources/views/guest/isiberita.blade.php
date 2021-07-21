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
        
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <div class="container position-relative px-4 px-lg-5">
                        <div class="row gx-4 gx-lg-5 justify-content-center">
                            <div class="col-md-10 col-lg-8 col-xl-7">
                                <div class="post-heading">
                                    <h1></h1>
                                    <h2 class="subheading">{{$berita->judul}}</h2>
                                    <span class="meta">
                                    Penulis
                                    <a href="{{$berita->link}}">{{$berita->penulis}}</a>
                                    Tanggal terbit :
                                    <a>{{$berita->tgl_terbit}}</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
        </header>
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>
                        {!!$berita->isi!!}
                        </p>
                    </div>
                </div>
            </div>
        </article>

<!-- Footer-->
<footer class="bg-light py-5">
    <div class="container px-4 px-lg-5"><div class="small text-justify text-muted">Copyright &copy; 2021 - UMKM Daerah Istimewa Yogyakarta</div></div>
</footer>
</html>
