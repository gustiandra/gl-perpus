@extends('admin.layout.app', ['title' => 'Dashboard', 'active' => 'dashboard'])
    
@section('content')
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
@endsection

@push('addon-script')
    <script src="{{ asset('dist/assets/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{ asset('dist/assets/js/pages/dashboard.js')}}"></script>    
@endpush