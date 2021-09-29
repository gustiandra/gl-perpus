<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.layouts.partials.head')
</head>

<body>    
    <div class="text-center bg-dark text-white p-3">
        <span>Belum bisa melakukan peminjaman, karena Anda belum melengkapi profil atau akun belum diverifikasi. </span> <a href="#" class="text-white"><u>Lengkapi profil di sini !</u></a>
    </div>    
    @include('user.layouts.partials.header')

    @yield('content')

    <!-- ======= Footer ======= -->
    @include('user.layouts.partials.footer')


    {{-- Back to Top --}}
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    @include('user.layouts.partials.script')

</body>

</html>