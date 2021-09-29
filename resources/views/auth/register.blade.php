@extends('auth.layouts.auth', ['title' => 'Registrasi'])
@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-center mt-3">
            <div class="col-md-8">
                <div class="mb-4">
                    <a href="{{ route('home') }}" class="text-decoration-none"><h1 class="font-weight-bold text-primary">GL-Perpus</h1></a>
                </div>
                <div class="mb-4">
                    <h4 class="font-weight-bolder">Registrasi</h4>
                    <p class="mb-4">Lengkapi form di bawah dengan data yang valid</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf                            
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">E-mail</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group  mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group  mb-3">
                        <label for="password">Konfirmasi Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                    </div>                    

                    <input type="submit" value="Mendaftar" class="btn btn-block btn-primary">
                    <span class="d-flex justify-content-center mt-4"><a class="forgot-pass" href="{{ route('login') }}">
                        Sudah memiliki akun? Log in
                    </a></span>
                </form>
            </div>
        </div>
    </div>
@endsection




