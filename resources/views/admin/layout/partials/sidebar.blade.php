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

                    <li class="sidebar-item  @if ($active == 'dashboard') {{ 'active' }} @endif">
                        <a href="index.html" class='sidebar-link'>
                            <i class="bi bi-grid"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item has-sub @if ($active == 'rack') {{ 'active' }} @endif">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-book-half"></i>
                            <span>Manajemen Buku</span>
                        </a>
                        <ul class="submenu @if ($active == 'rack') {{ 'active' }} @endif">
                            <li class="submenu-item">
                                <a href="kategori.html">Kategori</a>
                            </li>
                            <li class="submenu-item @if ($active == 'rack') {{ 'active' }} @endif">
                                <a href="{{ route('admin.rack.index') }}">Rak</a>
                            </li>
                            <li class="submenu-item">
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