@extends('layout.app')
@section('title', 'Profil ' . $user->nama)
@section('content')
    <div class="card shadow mb-4">
        <!-- Card Body -->
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4"> <i class="ti ti-user"></i> Profil Pengguna {{ $user->nama }}</h5>
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('user.update-profil', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- Nama Lengkap --}}
                <div class="form-group mb-1">
                    <label class="col-form-label" for="nama" style="font-weight: 500">Nama Lengkap</label>
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                        name="nama" value="{{ $user->nama }}" required autocomplete="nama" autofocus>
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Username --}}
                <div class="form-group mb-1">
                    <label class="col-form-label" for="username" style="font-weight: 500">Username</label>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                        name="username" value="{{ $user->username }}" disabled autocomplete="username">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-group mb-1">
                    <label class="col-form-label" for="password" style="font-weight: 500">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" autocomplete="new-password">
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
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        autocomplete="new-password">
                </div>

                {{-- Alamat --}}
                <div class="form-group mb-1">
                    <label class="col-form-label" for="alamat" style="font-weight: 500">Alamat</label>
                    <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"
                        name="alamat" value="{{ $user->alamat }}" required autocomplete="alamat">
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- No HP --}}
                <div class="form-group mb-1">
                    <label class="col-form-label" for="no_hp" style="font-weight: 500">Nomor HP</label>
                    <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror"
                        name="no_hp" value="{{ $user->no_hp }}" required autocomplete="no_hp">
                    @error('no_hp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Tanggal Lahir --}}
                <div class="form-group mb-1">
                    <label class="col-form-label" for="tgl_lahir" style="font-weight: 500">Tanggal Lahir</label>
                    <input id="tgl_lahir" type="date" class="form-control @error('tgl_lahir') is-invalid @enderror"
                        name="tgl_lahir" value="{{$user->tgl_lahir }}" required autocomplete="tgl_lahir">
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
                    <select id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror"
                        name="jenis_kelamin" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="laki_laki"{{ $user->jenis_kelamin == 'laki_laki' ? ' selected' : '' }}>
                            Laki-laki</option>
                        <option value="perempuan"{{ $user->jenis_kelamin == 'perempuan' ? ' selected' : '' }}>
                            Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Tombol Submit --}}
                <div class="form-group col-12 text-center my-4">
                    <a href="{{ route('user.index') }}" class="btn btn-light text-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
