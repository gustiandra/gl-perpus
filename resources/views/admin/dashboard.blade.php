<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | GL-Perpus</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/assets/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/iconly/bold.css')}}">
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/fontawesome/all.min.css')}}">

    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('dist/assets/css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('dist/assets/css/custom.css')}}">
    <link rel="shortcut icon" href="{{ asset('dist/assets/images/favicon.svg" type="image/x-icon')}}">

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('dist/assets/images/logo/logo.png')}}" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-grid"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item active has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-book-half"></i>
                                <span>Manajemen Buku</span>
                            </a>
                            <ul class="submenu active">
                                <li class="submenu-item">
                                    <a href="kategori.html">Kategori</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="rak.html">Rak</a>
                                </li>
                                <li class="submenu-item active">
                                    <a href="buku.html">Buku</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-people"></i>
                                <span>Manajemen Anggota</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="verifikasi-anggota.html">Verifikasi Anggota</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="anggota.html">Anggota</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="anggota-diblokir.html">Anggota Diblokir</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-journals"></i>
                                <span>Peminjaman Buku</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item">
                                    <a href="verifikasi-peminjaman.html">Verifikasi Peminjaman</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="buku-dipinjam.html">Buku Sedang Dipinjam</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="lewat-batas-peminjaman.html">Lewat Batas Peminjaman</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-graph-up"></i>
                                <span>Laporan</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item">
                                    <a href="favorit.html">Favorit</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="anggota-teraktif.html">Anggota Teraktif</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="seluruh-peminjaman.html">Seluruh Peminjaman</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a href="buku-rusak.html" class='sidebar-link'>
                                <i class="bi bi-card-checklist"></i>
                                <span>Pencatatan Buku Rusak</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="denda.html" class='sidebar-link'>
                                <i class="bi bi-wallet"></i>
                                <span>Catatan Keuangan Denda</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="peraturan.html" class='sidebar-link'>
                                <i class="bi bi-gear"></i>
                                <span>Peraturan</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0"></ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">Gustiandra</h6>
                                            <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{ asset('dist/assets/images/faces/gustiandra.jpg')}}">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                    style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Halo, Gustiandra!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="profil.html"><i
                                                class="icon-mid bi bi-person me-2"></i>Profil</a></li>
                                    <li><a class="dropdown-item" href="riwayat.html"><i
                                                class="icon-mid bi bi-clock-history me-2"></i>Riwayat</a></li>
                                    <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="login.html"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i>Keluar</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            <div id="main-content" class="mbc">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Dashboard</h3>
                            <p class="text-subtitle text-muted">Selamat Datang Admin GL-Perpus.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="row">
                        <div class="col-12 col-lg-9">
                            <div class="row">
                                <div class="col-12 col-lg-3 col-sm-6">
                                    <a href="anggota.html">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class=" text-center">
                                                    <i class="fas fa-users fa-3x text-primary"></i>
                                                    <h5 class="font-bold">1.230</h5>
                                                    <h6 class="text-muted mb-0">Anggota</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-3 col-sm-6">
                                    <a href="buku.html">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class=" text-center">
                                                    <i class="fas fa-book-open fa-3x text-primary"></i>
                                                    <h5 class="font-bold">180</h5>
                                                    <h6 class="text-muted mb-0">Buku</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-3 col-sm-6">
                                    <a href="buku-dipinjam.html">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class=" text-center">
                                                    <i class="fas fa-upload fa-3x text-primary"></i>
                                                    <h5 class="font-bold">123</h5>
                                                    <h6 class="text-muted mb-0">Peminjaman</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-3 col-sm-6">
                                    <a href="lewat-batas-peminjaman.html">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class=" text-center">
                                                    <i class="fas fa-exclamation-circle fa-3x text-primary"></i>
                                                    <h5 class="font-bold">12</h5>
                                                    <h6 class="text-muted mb-0">Lewat Batas</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-3 col-sm-6">
                                    <a href="verifikasi-peminjaman.html">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class=" text-center">
                                                    <i class="fas fa-certificate fa-3x text-primary"></i>
                                                    <h5 class="font-bold">13</h5>
                                                    <h6 class="text-muted mb-0">Peminjaman Belum Terverifikasi</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-3 col-sm-6">
                                    <a href="verifikasi-anggota.html">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class=" text-center">
                                                    <i class="fas fa-user-check fa-3x text-primary"></i>
                                                    <h5 class="font-bold">3</h5>
                                                    <h6 class="text-muted mb-0">User Belum Terverifikasi</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Statistik Peminjaman</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="chart-profile-visit"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header pb-0">
                                            <h4>Peminjaman Terbaru</h4>
                                        </div>
                                        <hr>
                                        <div class="card-content">
                                            <div class="d-flex py-2">
                                                <div class=" ms-4 ">
                                                    <h6 class="mb-1">Gustiandra - Susana Sundel Bolong</h6>
                                                    <h6 class="text-muted mb-0">13.00 29-07-21</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-flex py-2">
                                                <div class=" ms-4 ">
                                                    <h6 class="mb-1">Mutiara - Dilan 1991</h6>
                                                    <h6 class="text-muted mb-0">10.23 29-07-21</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-center">
                                                <a href="#">Lihat Semua <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header pb-0">
                                            <h4>Lewat Peminjaman Terbaru</h4>
                                        </div>
                                        <hr>
                                        <div class="card-content">
                                            <div class="d-flex py-2 ">
                                                <div class=" ms-4 ">
                                                    <h6 class="mb-1 text-danger">Gustiandra - Malin Kundang Suma...</h6>
                                                    <h6 class="text-muted mb-0">15.00 29-07-21</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-flex py-2 ">
                                                <div class=" ms-4 ">
                                                    <h6 class="mb-1 text-danger">Gustiandra - Malin Kundang Suma...</h6>
                                                    <h6 class="text-muted mb-0">15.00 29-07-21</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-flex py-2 ">
                                                <div class=" ms-4 ">
                                                    <h6 class="mb-1 text-danger">Gustiandra - Malin Kundang Suma...</h6>
                                                    <h6 class="text-muted mb-0">15.00 29-07-21</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-center">
                                                <a href="#">Lihat Semua <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2021 &copy; Mazer Web Design by <a href="https://ahmadsaugi.com">Saugi</a></p>
                        </div>
                        <div class="float-end">
                            <p>Laravel Development by Gustiandra Lesmana</p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="{{ asset('dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('dist/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('dist/assets/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{ asset('dist/assets/vendors/fontawesome/all.min.js')}}"></script>
    <script src="{{ asset('dist/assets/js/pages/dashboard.js')}}"></script>
    <script src="{{ asset('dist/assets/js/main.js')}}"></script>
</body>

</html>