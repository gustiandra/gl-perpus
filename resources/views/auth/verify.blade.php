@extends('auth.layouts.auth', ['title' => 'Verifikasi Email'])
@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-center mt-3">
            <div class="col-md-8">
                <div class="mb-4">
                    <h1 class="font-weight-bold text-primary">GL-Perpus</h1>
                </div>
                <div class="mb-4">
                    <h4 class="font-weight-bolder">Verifikasi Email</h4>
                    {{-- <p class="mb-4">Membaca adalah jembatan ilmu</p> --}}
                </div>                                
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif                
                {{ __('Cek email anda untuk melakukan verifikasi.') }}
                {{ __('Jika Anda tidak menerima email') }},
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('klik untuk mengirim ulang') }}</button>.
                </form>
            </div>
        </div>
    </div>
@endsection
