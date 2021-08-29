<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Galeri - Galeri UMKMku</title>
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
                        <li class="nav-item"><a class="nav-link" href="/lihatumkm">UMKM Terdaftar</a></li>
                        <li class="nav-item"><a class="nav-link" href="/lihatgaleri">Galeri</a></li>
                        <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                        @if(auth()->user())
                        <li class="nav-item"><a class="nav-link" href="{{url('/dashboard')}}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{'/logout'}}">Logout</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Galeri</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Galeri produk UMKMku</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    @foreach ($galeri as $glr)
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{{asset('images/galeri/'.$glr->foto)}}" title="{{$glr->nama_ush}}">
                            <img class="img-fluid" src="{{asset('images/galeri/'.$glr->foto)}}" height="100%" width="100%" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-name">{{$glr->nama_gal}}</div>
                                <div class="project-category text-white-50">{{$glr->ktrgn_foto}}</div>
                            </div>
                        </a>
                    </div>
                   @endforeach
                </div>
            </div>
        </div>            
        </div>
    </div>
</section>
<!-- Footer-->
<footer class="bg-light py-5">
    <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2021 - UMKM Daerah Istimewa Yogyakarta</div></div>
</footer>
</html>
