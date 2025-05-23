@extends('layout.app')
@section('title', 'Tambah Data Informasi Posyandu')
@section('content')
    <div class="card mb-4">
        <!-- Card Body -->
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4"> <i class="ti ti-circle-plus"></i> Tambah Data Informasi Posyandu </h5>
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
            <form method="POST" action="{{ route('penyuluhan.informasi.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label" for="topik" style="font-weight: 500">Judul/Topik</label>
                            <input type="text" name="topik" class="form-control" id="topik" placeholder="Masukkan judul atau deskripsi dari informasi posyandu" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label" for="deskripsi" style="font-weight: 500">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" required></textarea>
                        </div>
                    </div>
                </div>

                {{-- Tombol Submit --}}
                <div class="form-group col-12 text-center my-4">
                    <a href="{{ route('penyuluhan.informasi.index') }}" class="btn btn-light text-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
@endsection