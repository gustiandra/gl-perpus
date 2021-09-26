@extends('auth.layouts.auth', ['title' => 'Log In'])
@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-center mt-3">
            <div class="col-md-8">
                <div class="mb-4">
                    <h1 class="font-weight-bold text-primary">GL-Perpus</h1>
                </div>
                <div class="mb-4">
                    <h4 class="font-weight-bolder">Log In</h4>
                    <p class="mb-4">Membaca adalah jembatan ilmu</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
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
                    <div class="form-group  mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="d-flex mb-3 align-items-center">
                        <label class="control control--checkbox mb-0" for="remember"><span class="caption">Remember me</span>
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                            <div class="control__indicator"></div>
                        </label>
                        @if (Route::has('password.request'))
                            <span class="ml-auto"><a class="forgot-pass" href="{{ route('password.request') }}">
                                Forgot Password
                            </a></span>
                        @endif                                
                    </div>

                    <input type="submit" value="Log In" class="btn btn-block btn-primary">

                </form>
                <span class="d-flex justify-content-center mt-5"><a class="forgot-pass" href="{{ route('register') }}">
                    Belum memiliki akun? Registrasi
                </a></span>
            </div>
        </div>
    </div>
@endsection