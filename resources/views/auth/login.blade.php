@extends('layouts.auth')
<style>
    .ml{
        margin-top: 5px;
    }
</style>

@section('title',"Halaman Login")
@section('login')
<div class="container">
    <div class="row">
        <div class="col-md-6 order-md-2">
            <img src="{{ asset('landing/img/img.svg') }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="mb-4">
                        <h3>Silahkan Masukkan Username Dan password</h3>
                        <p class="mb-4">Mulailah Kuismu dengan mengisi form login di bawah ini.</p>
                    </div>
                    <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group first">
                            <label for="username">Username</label>
                            <input type="email" class="form-control" style="color: white" name="email" id="username" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group last mb-4">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" style="color:white" name="password" id="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex mb-5 align-items-center">
                            <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                <input type="checkbox" checked="checked" name="remember" {{ old('remember') ? 'checked' : '' }} />
                                <div class="control__indicator"></div>
                            </label>
                            <span class="ml-auto">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="forgot-pass">Lupa Password</a></span>
                                @endif
                        </div>
                        <input type="submit" value="Log In" class="btn text-white btn-block" style="background: gray">

                    </form>
                    <div class="d-flex mb-5 align-items-center">
                        <p class="ml">Belum Punya Akun?</p>
                        <a href="{{ route('register') }}" class="ml-auto">Daftar</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
