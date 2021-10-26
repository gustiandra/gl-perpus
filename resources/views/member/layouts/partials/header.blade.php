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
                        <li class="@if($active == 'beranda') {{ 'active' }} @endif"><a href="{{ route('home') }}" class="nav-link">Beranda</a></li>
                        <li class="@if($active == 'book') {{ 'active' }} @endif"><a href="{{ route('book.index') }}" class="nav-link">Buku</a></li>
                        <li class="@if($active == 'peraturan') {{ 'active' }} @endif"><a href="{{ route('peraturan.index') }}" class="nav-link">Peraturan</a></li>
                        <li><a href="pricing.html" class="nav-link">Kontak</a></li>
                        
                        @guest
                        <li><a href="{{ route('login') }}" class="nav-link btn btn-sm btn-secondary text-white">Login</a></li>                            
                        <li><a href="{{ route('register') }}" class="nav-link btn btn-sm btn-primary text-white">Registrasi</a></li>
                        @else
                            <li class="has-children">
                                <a href="#" class="nav-link">{{ Auth::user()->name }}</a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('member.dashboard') }}" class="nav-link">Dashboard</a></li>
                                    <li><a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Keluar</a></li>                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest
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