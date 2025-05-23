@extends('layout.app')
@section('title', 'Tambah Data Artikel Kesehatan Posyandu')
@section('content')
    <div class="card mb-4">
        <!-- Card Body -->
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4"> <i class="ti ti-circle-plus"></i> Tambah Data Artikel Kesehatan Posyandu </h5>
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
            <form method="POST" action="{{ route('penyuluhan.artikel_kesehatan.store') }}" enctype="multipart/form-data">
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
               <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="image-dropify" class="col-form-label" style="font-weight: 500">Gambar</label>
                            <div class="form-group">
                                @include('components.upload_image.html')
                            </div>
                            <textarea id="image-dropify-send" class="d-none" name="image" required></textarea>
                        </div>
                    </div>
                </div>

                {{-- Tombol Submit --}}
                <div class="form-group col-12 text-center my-4">
                    <a href="{{ route('penyuluhan.artikel_kesehatan.index') }}" class="btn btn-light text-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
@include('components.upload_image.js')
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
@endsection