@extends('user.layouts.app', ['title' => 'Beranda'])

@section('content')
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
@endsection