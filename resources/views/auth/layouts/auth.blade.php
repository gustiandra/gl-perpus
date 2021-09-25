<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('dist/assets/fonts/icomoon/style.css') }}">    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/bootstrap/css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/style-login.css') }}">

    <title>{{ $title }} | GL-Perpus</title>
</head>

<body>
    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('{{ Storage::url('/assets/register.jpg') }}');"></div>
        <div class="contents order-2 order-md-1">

            @yield('content')
        </div>
    </div>
    <script src="{{ asset('dist/assets/vendors/jquery/jquery.min.js') }}"></script>    
    <script src="{{ asset('dist/assets/js/bootstrap.min.js') }}"></script>    
</body>

</html>

