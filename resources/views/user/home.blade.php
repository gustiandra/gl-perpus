<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>GL-Perpus</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('storage/assets') }} /logo-kecil.png" rel="icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('dist/assets/vendors/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/assets/vendors/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/assets/vendors/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/assets/vendors/line-awesome/css/line-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/assets/vendors/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style-user.css') }}" rel="stylesheet">    
</head>

<body>

    <!-- ======= Mobile Menu ======= -->
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <!-- ======= Header ======= -->
    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

        <div class="container">
            <div class="row align-items-center">

                <div class="col-6 col-lg-2">
                    <h1 class="mb-0 site-logo"><a href="{{ route('home') }}" class="mb-0 font-weight-bold">GL-Perpus</a></h1>
                </div>

                <div class="col-12 col-md-10 d-none d-lg-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">

                        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li class="active"><a href="{{ route('home') }}" class="nav-link">Beranda</a></li>
                            <li><a href="buku.html" class="nav-link">Buku</a></li>
                            <li><a href="pricing.html" class="nav-link">Peraturan</a></li>
                            <li><a href="pricing.html" class="nav-link">Kontak</a></li>

                            <li class="has-children">
                                <a href="blog.html" class="nav-link">Gustiandra</a>
                                <ul class="dropdown">
                                    <li><a href="blog.html" class="nav-link">Dashboard</a></li>
                                    <li><a href="blog-single.html" class="nav-link">Keluar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="col-6 d-inline-block d-lg-none ml-md-0 py-3" style="position: relative; top: 3px;">

                    <a href="#" class="burger site-menu-toggle js-menu-toggle" data-toggle="collapse"
                        data-target="#main-navbar">
                        <span></span>
                    </a>
                </div>

            </div>
        </div>

    </header>

    <!-- ======= Hero Section ======= -->
    <section class="hero-section" id="hero">

        <div class="wave">

            <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#f8f9fa">
                        <path
                            d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z"
                            id="Path"></path>
                    </g>
                </g>
            </svg>

        </div>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 hero-text-image">
                    <div class="row">
                        <div class="col-lg-7 text-center text-lg-left">
                            <h1 data-aos="fade-right">Pinjam Buku Lebih Mudah Dengan <br>GL-Perpus</h1>
                            <p class="mb-5" data-aos="fade-right" data-aos-delay="100">Developed by Gustiandra Lesmana.
                            </p>
                            <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="#"
                                    class="btn btn-outline-white">Cari Buku</a></p>
                        </div>
                        <div class="col-lg-5 iphone-wrap">
                            <img src="{{ Storage::url('assets/library-2.png') }}" alt="Image" class="phone-1" data-aos="fade-right">
                            <img src="{{ Storage::url('assets/library-1.png') }}" alt="Image" class="phone-2" data-aos="fade-right"
                                data-aos-delay="200">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">
        <!-- Buku Baru -->
        <section class="section">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="100">
                        <!-- <h5>Buku Terbaru</h5> -->
                        <h5 class="section-heading">Buku Terbaru</h5>
                    </div>
                </div>
                <div class="row book">
                    <div class="col-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ Storage::url('/assets/book-cover/Yuk Mari Sekolah.jpg') }}" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h6 class="card-title">Book of Alice</h6>
                                        <p class="card-subtitle">Gustiandra Lesmana | PT. WIB | 2021</p>
                                        <p class="card-text ">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Nulla voluptates ipsam quidem ratione. Quo, ipsum recusandae corporis
                                            molestias aut</p>
                                        <p class="card-text category">Kategori : Horor, Scifi
                                        </p>
                                        </p>
                                        <p class="card-text">Tersedia : <span class="text-danger">0 (Dalam
                                                Peminjaman)</span></p>
                                        <div class="review">
                                            <p class="stars font-stars">
                                                4.9 <span class="icofont-star"></span> | 20 Terpinjam
                                            </p>
                                        </div>
                                        <a href="" class="btn btn-primary btn-sm">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-4" data-aos="fade-up" data-aos-delay="100">
                        <a href="#" class="btn btn-warning btn-sm">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </section>


        <!-- ======= Testimonials Section ======= -->
        <section class="section border-top border-bottom">
            <div class="container">
                <div class="row justify-content-center text-center mb-5">
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <h5 class="section-heading">Kata Mereka Tentang GL- Perpus</h5>
                    </div>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
                        <div class="owl-carousel testimonial-carousel">
                            <div class="review text-center">
                                <p class="stars">
                                    <span class="icofont-star"></span>
                                    <span class="icofont-star"></span>
                                    <span class="icofont-star"></span>
                                    <span class="icofont-star"></span>
                                    <span class="icofont-star muted"></span>
                                </p>
                                <h3>Excellent App!</h3>
                                <blockquote>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius ea delectus
                                        pariatur, numquam
                                        aperiam dolore nam optio dolorem facilis itaque voluptatum recusandae deleniti
                                        minus animi,
                                        provident voluptates consectetur maiores quos.</p>
                                </blockquote>

                                <p class="review-user">
                                    <img src="{{ Storage::url('/assets/profil/') }}person_1.jpg" alt="Image"
                                        class="img-fluid rounded-circle mb-3">
                                    <span class="d-block">
                                        <span class="text-black">Jean Doe</span>, &mdash; App User
                                    </span>
                                </p>

                            </div>

                            <div class="review text-center">
                                <p class="stars">
                                    <span class="icofont-star"></span>
                                    <span class="icofont-star"></span>
                                    <span class="icofont-star"></span>
                                    <span class="icofont-star"></span>
                                    <span class="icofont-star muted"></span>
                                </p>
                                <h3>This App is easy to use!</h3>
                                <blockquote>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius ea delectus
                                        pariatur, numquam
                                        aperiam dolore nam optio dolorem facilis itaque voluptatum recusandae deleniti
                                        minus animi,
                                        provident voluptates consectetur maiores quos.</p>
                                </blockquote>

                                <p class="review-user">
                                    <img src="{{ Storage::url('/assets/profil/') }}person_2.jpg" alt="Image"
                                        class="img-fluid rounded-circle mb-3">
                                    <span class="d-block">
                                        <span class="text-black">Johan Smith</span>, &mdash; App User
                                    </span>
                                </p>

                            </div>

                            <div class="review text-center">
                                <p class="stars">
                                    <span class="icofont-star"></span>
                                    <span class="icofont-star"></span>
                                    <span class="icofont-star"></span>
                                    <span class="icofont-star"></span>
                                    <span class="icofont-star muted"></span>
                                </p>
                                <h3>Awesome functionality!</h3>
                                <blockquote>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius ea delectus
                                        pariatur, numquam
                                        aperiam dolore nam optio dolorem facilis itaque voluptatum recusandae deleniti
                                        minus animi,
                                        provident voluptates consectetur maiores quos.</p>
                                </blockquote>

                                <p class="review-user">
                                    <img src="{{ Storage::url('/assets/profil/') }}person_3.jpg" alt="Image"
                                        class="img-fluid rounded-circle mb-3">
                                    <span class="d-block">
                                        <span class="text-black">Jean Thunberg</span>, &mdash; App User
                                    </span>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Testimonials Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer class="footer mt-3" role="contentinfo">
        <div class="container">
            <form action="">
                <div class="row mb-2">
                    <div class="col-12">
                        <h3>Kritik & Saran</h3>
                        <div class="form-group">
                            <textarea name="" id="" rows="3" class="form-control"></textarea>
                        </div>
                        <button class="btn btn-primary btn-sm float-right">KIRIM</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h3>Tentang GL-Perpus</h3>
                    <p>GL-Perpus adalah aplikasi yang menangani sistem informasi perpustakaan secara digital. Pendataan
                        anggota, manajemen buku, hingga peminjaman terakomodasi di sini. Ditambah dengan sistem
                        rekomendasi menggunakan metode klastering</p>
                </div>
                <div class="col-md-7 ml-auto">
                    <div class="row site-section pt-0">
                        <div class="col-md-4 mb-4 mb-md-0">
                            <h3>Temukan Saya</h3>
                            <ul class="list-unstyled">
                                <li><a href="#"><span class="icofont-facebook"> Gustiandra Lesmana</a></li>
                                <li><a href="#"><span class="icofont-instagram"> @gustiandralesmana</a></li>
                                <li><a href="#"><span class="icofont-mail"> lesmana142@gmail.com</a></li>
                                <li><a href="#"><span class="icofont-linkedin"> gustiandralesmana</a></li>
                                <li><a href="#"><span class="icofont-youtube"> Gustiandra Lesmana</a></li>
                                <li><a href="#"><span class="icofont-web"> appsbygustiandra.my.id</a></li>
                            </ul>
                        </div>
                        <div class="col-md-8 mb-4 mb-md-0">
                            <h3>SKill Saya</h3>
                            <ul class="list-unstyled">
                                <li><a href="#">Web Programming (PHP Laravel or CodeIgniter)</a></li>
                                <li><a href="#">Mobile Programming (Flutter)</a></li>
                                <li><a href="#">Front-End Web Programming (Vue.JS)</a></li>
                                <li><a href="#">UI Design</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('dist/assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/assets/vendors/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('dist/assets/vendors/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('dist/assets/vendors/aos/aos.js') }}"></script>
    <script src="{{ asset('dist/assets/vendors/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('dist/assets/vendors/jquery-sticky/jquery.sticky.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main-user.js') }}"></script>

</body>

</html>