@extends('auth.layouts.auth', ['title' => 'Reset Passowrd'])
@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-center mt-3">
            <div class="col-md-8">
                <div class="mb-4">
                    <a href="{{ route('home') }}" class="text-decoration-none"><h1 class="font-weight-bold text-primary">GL-Perpus</h1></a>
                </div>
                <div class="mb-4">
                    <h4 class="font-weight-bolder">Reset Password</h4>
                    {{-- <p class="mb-4">Membaca adalah jembatan ilmu</p> --}}
                </div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <label for="username">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>                                    
                    <input type="submit" value="Kirim Link Pembaharuan Password" class="btn btn-block btn-primary">

                </form>                
                <span class="d-flex justify-content-center mt-5"><a class="forgot-pass" href="{{ route('login') }}">
                    Login
                </a></span>
            </div>
        </div>
    </div>
@endsection

