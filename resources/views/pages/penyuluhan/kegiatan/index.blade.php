@extends('layout.app')
@section('title', 'Kegiatan Posyandu')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
                <h5 class="card-title fw-semibold my-auto"><a href="{{ route('penyuluhan.index') }}"
                        class="btn btn-light btn-sm my-auto me-2"><i class="ti ti-arrow-left"></i> </a>
                    Kegiatan Posyandu
                </h5>
                <div class="my-auto">
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('penyuluhan.kegiatan.create') }}" class="btn btn-primary btn-sm">
                            Tambah Data
                            <i class="ti ti-plus"></i>
                        </a>
                    @endif
                </div>
            </div>
            <div class="row">
                @foreach ($data as $item)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card">
                            <div class=" position-relative rounded-bottom">
                                <img src="{{ $item->format_image }}" class="card-img-top rounded" alt="{{ $item->format_image }}">
                                <div class="card-body position-absolute bottom-0 start-0 bg-dark bg-opacity-50 w-100 rounded-bottom">
                                    <h5 class="card-title text-white">{{ $item->topik }}</h5>
                                    <p class="card-text text-white"> {{ $item->format_created_at }}</p>
                                </div>
                            </div>
                            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kader')
                                <div class="card-footer">
                                        <a class="btn btn-success btn-sm m-1"
                                            href="{{ route('penyuluhan.kegiatan.edit', $item->id) }}">
                                            Edit <i class="ti ti-edit ms-2"></i>
                                        </a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-sm m-1" data-bs-toggle="modal"
                                            data-bs-target="#model_delete{{ $item->id }}">
                                            Hapus <i class="ti ti-trash"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="model_delete{{ $item->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('penyuluhan.kegiatan.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-header border-0">
                                                            <h5 class="modal-title">Peringatan!</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body border-0">
                                                            Apakah anda yakin ingin menghapus data ini?
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center border-0">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit"class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
