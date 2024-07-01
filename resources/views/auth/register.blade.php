@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row align-items-center" style="min-height: 100vh">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-10 mb-5">
                        <div class="auth position-relative" style="padding: 8px">
                            <div class="bg-primary position-absolute rounded-3 top-0 start-0 bottom-0 end-0 rotate-2"
                                style="transform: rotate(1.5deg)"></div>
                            <div class="card rounded-3 border-0">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <img src="/images/daftar.png" class="w-50" alt="daftar">
                                    </div>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="row g-2 mb-2">
                                            <div class="col-6">
                                                <input id="first_name" type="text"
                                                    class="form-control @error('first_name') is-invalid @enderror"
                                                    name="first_name" value="{{ old('first_name') }}" required
                                                    autocomplete="first_name" autofocus placeholder="Nama Depan">

                                                @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <input id="last_name" type="text"
                                                    class="form-control @error('last_name') is-invalid @enderror"
                                                    name="last_name" value="{{ old('last_name') }}" required
                                                    autocomplete="last_name" placeholder="Nama Belakang">

                                                @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <input id="username" type="text"
                                                class="form-control @error('username') is-invalid @enderror" name="username"
                                                required placeholder="username">

                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-2">
                                            <input id="phone_number" type="text"
                                                class="form-control @error('phone_number') is-invalid @enderror"
                                                name="phone_number" required placeholder="phone number">

                                            @error('phone_number')
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
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password"
                                                placeholder="Ulangi password">
                                        </div>

                                        <div class="mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    Saya telah menyetujui Syarat & Ketentuan serta Kebijakan Privasi
                                                </label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-info w-100 mb-1 rounded-0 text-light fw-bold">
                                            Buat Akun
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <a href="{{ route('home') }}"><img src="/images/kembali.png" width="20%" alt="kembali"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
