<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('UMKMku - Daerah Istimewa Yogyakarta')</title>
        <!-- Favicon-->
        <!-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/">UMKMku</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <!-- <li class="nav-item"><a class="nav-link" href="/lihatberita">Berita</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="/lihatumkm">UMKM Terdaftar</a></li>
                        <li class="nav-item"><a class="nav-link" href="/lihatgaleri">Galeri</a></li>
                        <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Selamat Datang di UMKMku</h1>
                        <hr class="divider">
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">UMKMku merupakan sebuah sistem informasi berbasis web Daerah Istimewa Yogyakarta yang memvisualisasikan pesebaran UMKM dengan kategori kuliner dan sebagai media promosi produk - produk UMKM kota Yogyakarta</p>
                        <a class="btn btn-primary btn-xl" href="/lihatmaps">Jelajahi</a>
                    </div>
                </div>
            </div>
        </header>
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Berita</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Berita terkait UMKMku</p>
                    <br>
        @foreach ($berita as $brt)
        <div class="container px-4 px-lg-5">
                    <!-- Post preview-->
                    <div class="post-preview">
                            <h2 class="post-title">{{$brt->judul}}</h2>
                        <p class="post-meta">
                            Penulis
                            <a href="{{$brt->link}}">{{$brt->penulis}}</a>
                            Tanggal terbit :
                            <a>{{$brt->tgl_terbit}}</a>
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Pager-->
                    
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="/berita/{{$brt->id_berita}}">Lihat Berita</a></div>
        </div>
        @endforeach
        </div>
    </div>
</header>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2021 - UMKM Daerah Istimewa Yogyakarta</div></div>
        </footer>
       
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
