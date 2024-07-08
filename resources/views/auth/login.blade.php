@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row align-items-center wrapper-auth">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-10 col-md-5 mb-5">
                        <div class="auth position-relative" style="padding: 8px">
                            <div class="bg-primary position-absolute rounded-3 top-0 start-0 bottom-0 end-0 rotate-2"
                                style="transform: rotate(1.5deg)"></div>
                            <div class="card rounded-3 border-0">
                                <div class="card-body">
                                    <div class="row mb-3 justify-content-center">
                                        <div class="col-6 col-md-4">
                                            <img src="/images/masuk.png" class="w-100" alt="masuk">
                                        </div>
                                    </div>
                                    <form method="POST" class="px-0 px-md-5" action="{{ route('login') }}">
                                        @csrf

                                        <div class="mb-2">
                                            <input id="email" type="username"
                                                class="form-control @error('username') is-invalid @enderror" name="username"
                                                value="{{ old('username') }}" required autocomplete="username" autofocus
                                                placeholder="Username">

                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-2">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="current-password" placeholder="Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('ingatkan saya') }}
                                                </label>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-info btn-login mb-3 rounded-0 text-light fw-bold">
                                                Kirim
                                            </button>
                                        </div>
                                        <div class="text-center">
                                            <small class="m-0 p-0 d-block">belum punya akun?</small>
                                            <a class="fw-bold text-decoration-none text-dark"
                                                href="{{ route('register') }}">
                                                Daftar di sini
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-3 col-md-1 mt-0 mt-md-4">
                                <a href="{{ route('home') }}"><img src="/images/kembali.png" class="w-100"
                                        alt="kembali"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
