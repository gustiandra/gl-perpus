@extends('auth.layouts.auth', ['title' => 'Lupa Password'])
@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-center mt-3">
            <div class="col-md-8">
                <div class="mb-4">
                    <a href="{{ route('home') }}" class="text-decoration-none"><h1 class="font-weight-bold text-primary">GL-Perpus</h1></a>
                </div>
                <div class="mb-4">
                    <h4 class="font-weight-bolder">Masukan Password Baru</h4>
                    {{-- <p class="mb-4">Membaca adalah jembatan ilmu</p> --}}
                </div>                
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <label for="username">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group ">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group ">
                        <label for="password-confirm">Ulangi Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <input type="submit" value="Log In" class="btn btn-block btn-primary">

                </form>                
            </div>
        </div>
    </div>
@endsection

