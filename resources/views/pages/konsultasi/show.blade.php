@extends('layout.app')
@section('title', 'Detail Konsultasi')
@section('content')
    <div class="card shadow mb-4">
        <!-- Card Body -->
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4"> <i class="ti ti-message"></i> Detail Konsultasi</h5>
            <div class="row">
                <div class="col-12 col-lg-2">
                    <p class="mb-0 fw-bold text-black">ID Anggota</p>
                </div>
                <div class="col-12 col-lg-10">
                    <p>{{ $konsultasi->user->id }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-2">
                    <p class="mb-0 fw-bold text-black">Nama</p>
                </div>
                <div class="col-12 col-lg-10">
                    <p>{{ $konsultasi->user->nama }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-2">
                    <p class="mb-0 fw-bold text-black">Usia</p>
                </div>
                <div class="col-12 col-lg-10">
                    <p>{{ $konsultasi->user->usia }} Tahun</p>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12 col-lg-2">
                    <p class="mb-0 fw-bold text-black">Gender</p>
                </div>
                <div class="col-12 col-lg-10">
                    @switch($konsultasi->user->jenis_kelamin)
                        @case('laki_laki')
                            <span class="badge rounded-pill text-bg-primary">Laki-laki
                                <i class="ti ti-gender-male"></i></span>
                        @break

                        @case('perempuan')
                            <span class="badge rounded-pill text-bg-success">Perempuan
                                <i class="ti ti-gender-female" aria-hidden="true"></i></span>
                        @break

                        @default
                            <span class="badge rounded-pill text-bg-danger">{{ $item->status }}</span>
                        @break
                    @endswitch
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-2">
                    <p class="mb-0 fw-bold text-black">Tanggal</p>
                </div>
                <div class="col-12 col-lg-10">
                    <p>{{ $konsultasi->format_tgl_konsultasi }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-2">
                    <p class="mb-0 fw-bold text-black">Pertanyaan</p>
                </div>
                <div class="col-12 col-lg-10">
                    <p>{!! $konsultasi->pertanyaan !!}</p>
                </div>
            </div>
            @if (!empty($konsultasi->jawaban))
                <div class="row">
                    <div class="col-12 col-lg-2">
                        <p class="mb-0 fw-bold text-black">Jawaban</p>
                    </div>
                    <div class="col-12 col-lg-10">
                        <p>{!! $konsultasi->jawaban !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-2">
                        <p class="mb-0 fw-bold text-black">Dijawab oleh</p>
                    </div>
                    <div class="col-12 col-lg-10">
                        <p>{!! $konsultasi->petugas->nama !!}</p>
                    </div>
                </div>
                <a href="{{ route('konsultasi.index') }}" class="btn btn-light text-danger">Kembali</a>
            @endif
        </div>
    </div>
    @if ((Auth::user()->role == 'petugas' || Auth::user()->role == 'admin') && empty($konsultasi->jawaban))
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">
                <h5 class="card-title text-center fw-semibold mb-4"> Jawab Pertanyaan</h5>
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
                <form method="POST" action="{{ route('konsultasi.update', $konsultasi->id) }}"
                    enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <textarea class="form-control" name="jawaban" id="jawaban" rows="3" required></textarea>

                    <div class="form-group col-12 text-center my-4">
                        <a href="{{ route('konsultasi.index') }}" class="btn btn-light text-danger">Kembali</a>
                        <button type="submit" class="btn btn-primary">Jawab Pertanyaan</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endsection
@section('js')
    <script>
        CKEDITOR.replace('jawaban');
    </script>
@endsection
