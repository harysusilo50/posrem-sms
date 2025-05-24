@extends('layout.app')
@section('title', $data->topik)
@section('content')
    <div class="card">
        <div class="d-flex justify-content-between card-header">
            <h5 class="card-title fw-semibold my-auto"><a href="{{ route('penyuluhan.artikel_kesehatan.index') }}"
                    class="btn btn-light bg-white btn-sm my-auto me-2"><i class="ti ti-arrow-left"></i> </a>
                    Tentang Kesehatan Remaja
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <h2 class="h2">{{ $data->topik }}</h2>
                <h4 class="card-subtitle text-muted mb-4">{{ $data->format_created_at }}</h4>
                <div class="d-flex justify-content-center mb-4">
                    <img src="{{ $data->format_image }}" alt="{{ $data->format_image }}" class="w-50">
                </div>
                <div class="text-black text-">
                    {!! $data->deskripsi !!}
                </div>
            </div>
        </div>
    </div>
@endsection
