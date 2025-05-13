@extends('auth.layout')
@section('title', 'Register')
@section('content')
    <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="text-center text-md-left">
                            <h1 class="h4 text-gray-900 mb-3" style="font-weight: 500">Daftar Akun</h1>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            {{-- Nama Lengkap --}}
                            <div class="form-group mb-1">
                                <label class="col-form-label" for="nama" style="font-weight: 500">Nama Lengkap</label>
                                <input id="nama" type="text"
                                    class="form-control @error('nama') is-invalid @enderror" name="nama"
                                    value="{{ old('nama') }}" required autocomplete="nama" autofocus>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Username --}}
                            <div class="form-group mb-1">
                                <label class="col-form-label" for="username" style="font-weight: 500">Username</label>
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" required autocomplete="username">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="form-group mb-1">
                                <label class="col-form-label" for="password" style="font-weight: 500">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Konfirmasi Password --}}
                            <div class="form-group mb-1">
                                <label class="col-form-label" for="password-confirm" style="font-weight: 500">Konfirmasi
                                    Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>

                            {{-- Alamat --}}
                            <div class="form-group mb-1">
                                <label class="col-form-label" for="alamat" style="font-weight: 500">Alamat</label>
                                <input id="alamat" type="text"
                                    class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                    value="{{ old('alamat') }}" required autocomplete="alamat">
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- No HP --}}
                            <div class="form-group mb-1">
                                <label class="col-form-label" for="no_hp" style="font-weight: 500">Nomor HP</label>
                                <input id="no_hp" type="text"
                                    class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"
                                    value="{{ old('no_hp') }}" required autocomplete="no_hp">
                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Tanggal Lahir --}}
                            <div class="form-group mb-1">
                                <label class="col-form-label" for="tgl_lahir" style="font-weight: 500">Tanggal Lahir</label>
                                <input id="tgl_lahir" type="date"
                                    class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir"
                                    value="{{ old('tgl_lahir') }}" required autocomplete="tgl_lahir">
                                @error('tgl_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Jenis Kelamin --}}
                            <div class="form-group mb-1">
                                <label class="col-form-label" for="jenis_kelamin" style="font-weight: 500">Jenis
                                    Kelamin</label>
                                <select id="jenis_kelamin"
                                    class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
                                    required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="laki_laki"{{ old('jenis_kelamin') == 'laki_laki' ? ' selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="perempuan"{{ old('jenis_kelamin') == 'perempuan' ? ' selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Tombol Submit --}}
                            <button class="btn btn-primary w-100 py-8 fs-4 my-4 rounded-2"
                                type="submit">Registrasi</button>
                            <div class="d-flex align-items-center justify-content-center">
                                <p class="fs-4 mb-0 fw-bold">Sudah punya akun?</p>
                                <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Masuk</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
