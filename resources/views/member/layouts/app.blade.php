<!DOCTYPE html>
<html lang="en">

<head>
    @include('member.layouts.partials.head')
</head>

<body>    
    @guest

    @else    
        @if (Auth::user()->member->status != "AKTIF")        
        <div class="text-center bg-dark text-white p-3">
            <span>Belum bisa melakukan peminjaman, karena Anda belum melengkapi profil atau akun belum diverifikasi. </span> <a href="{{ route('member.profile') }}" class="text-white"><u>Lengkapi profil di sini !</u></a>
        </div>    
    @endguest
    
    @endif
    @include('member.layouts.partials.header')

    @yield('content')

    <!-- ======= Footer ======= -->
    @include('member.layouts.partials.footer')


    {{-- Back to Top --}}
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    @include('member.layouts.partials.script')

</body>

</html>