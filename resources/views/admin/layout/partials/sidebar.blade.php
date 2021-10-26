<div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('dist/assets/images/logo/logo.png')}}" alt="Logo" srcset=""></a>
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
                        <a href="@if (Auth::user()->hasRole('member'))
                            {{ route('member.dashboard') }}
                        @endif" class='sidebar-link'>
                            <i class="bi bi-grid"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    {{-- Sidebar Admin --}}
                    @if (Auth::user()->hasRole('admin|super-admin'))                        
                        <li class="sidebar-item has-sub @if ($active == 'rack' || $active == 'category' || $active == 'book') {{ 'active' }} @endif">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-book-half"></i>
                                <span>Manajemen Buku</span>
                            </a>
                            <ul class="submenu @if ($active == 'rack' || $active == 'category' || $active == 'book') {{ 'active' }} @endif">
                                <li class="submenu-item @if ($active == 'category') {{ 'active' }} @endif">
                                    <a href="{{ route('admin.category.index') }}">Kategori</a>
                                </li>
                                <li class="submenu-item @if ($active == 'rack') {{ 'active' }} @endif">
                                    <a href="{{ route('admin.rack.index') }}">Rak</a>
                                </li>
                                <li class="submenu-item @if ($active == 'book') {{ 'active' }} @endif">
                                    <a href="{{ route('admin.book.index') }}">Buku</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub @if ($active == 'verif' || $active == 'member' || $active == 'blok') {{ 'active' }} @endif">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-people"></i>
                                <span>Manajemen Member</span>
                            </a>
                            <ul class="submenu @if ($active == 'verif' || $active == 'member' || $active == 'blok') {{ 'active' }} @endif">
                                <li class="submenu-item @if ($active == 'verif') {{ 'active' }} @endif">
                                    <a href="{{ route('admin.member.verif.index') }}">Verifikasi Member</a>
                                </li>
                                <li class="submenu-item @if ($active == 'member') {{ 'active' }} @endif">
                                    <a href="{{ route('admin.member.index') }}">Member</a>
                                </li>
                                <li class="submenu-item @if ($active == 'blok') {{ 'active' }} @endif">
                                    <a href="{{ route('admin.member.blocked.index') }}">Member Diblokir</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item has-sub @if ($active == 'verif_borrow' || $active == 'borrow' || $active == 'past') {{ 'active' }} @endif">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-journals"></i>
                                <span>Peminjaman Buku</span>
                            </a>
                            <ul class="submenu @if ($active == 'verif_borrow' || $active == 'borrow' || $active == 'past') {{ 'active' }} @endif">
                                <li class="submenu-item @if ($active == 'verif_borrow') {{ 'active' }} @endif">
                                    <a href="{{ route('admin.borrow.verif.index') }}">Verifikasi Peminjaman</a>
                                </li>
                                <li class="submenu-item @if ($active == 'borrow') {{ 'active' }} @endif">
                                    <a href="{{ route('admin.borrow.index') }}">Buku Sedang Dipinjam</a>
                                </li>
                                <li class="submenu-item @if ($active == 'past') {{ 'active' }} @endif">
                                    <a href="{{ route('admin.borrow.past') }}">Lewat Batas Peminjaman</a>
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
                    @elseif (Auth::user()->hasRole('member'))
                    <li class="sidebar-item @if ($active == 'profile') {{ 'active' }} @endif">
                        <a href="{{ route('member.profile') }}" class='sidebar-link'>
                            <i class="bi bi-person"></i>
                            <span>Profil</span>
                        </a>
                    </li>
                    <li class="sidebar-item @if ($active == 'borrowed') {{ 'active' }} @endif">
                        <a href="{{ route('member.borrowed.index') }}" class='sidebar-link'>
                            <i class="bi bi-journals"></i>
                            <span>Peminjaman</span>
                        </a>
                    </li>

                    @endif
                    {{-- End Sidebar Admin --}}
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>