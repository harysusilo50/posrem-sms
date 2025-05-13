@extends('auth.layout')
@section('title', 'Login')
@section('content')
    <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
                <div class="card mb-0">
                    <div class="card-body">
                        <a class="text-nowrap logo-img text-center d-block py-3 w-100">
                            <img src="{{ asset('img/logo.png') }}" width="180" alt="">
                        </a>
                        <div class="text-center text-md-left">
                            <h1 class="h4 text-gray-900" style="font-weight: 500">Masuk</h1>
                            <p class="text-center">Masukan username dan password anda untuk masuk ke sistem</p>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username">
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="submit">Masuk</button>
                            <div class="d-flex align-items-center justify-content-center">
                                <p class="fs-4 mb-0 fw-bold">Belum punya akun?</p>
                                <a class="text-primary fw-bold ms-2" href="{{ route('register') }}">Daftar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
