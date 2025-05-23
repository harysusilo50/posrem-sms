@extends('layout.app')
@section('title', 'Penyuluhan')
@section('content')
    <div class="bg-light rounded-3 py-3">
        <h2 class="text-center mb-5">Informasi Posyandu</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-10 col-lg-6 d-flex justify-content-center">
                <a href="{{ route('penyuluhan.informasi.index') }}" class="card col-12 col-md-10 text-decoration-none">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-4">Informasi Posyandu Remaja</h4>
                        <div class="text-center">
                            <img src="{{ asset('img/newspaper.png') }}" class="w-25">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-10 col-lg-6 d-flex justify-content-center">
                <a href="{{ route('penyuluhan.kegiatan.index') }}" class="card col-12 col-md-10 text-decoration-none">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-4">Kegiatan Posrem SMS</h4>
                        <div class="text-center">
                            <img src="{{ asset('img/health.png') }}" class="w-25">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-10 col-lg-6 d-flex justify-content-center">
                <a href="{{ route('penyuluhan.artikel_kesehatan.index') }}" class="card col-12 col-md-10 text-decoration-none">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-4">Tentang Kesehatan Remaja</h4>
                        <div class="text-center">
                            <img src="{{ asset('img/nurses.png') }}" class="w-25">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-10 col-lg-6 d-flex justify-content-center">
                <a href="{{ route('penyuluhan.artikel_mental.index') }}" class="card col-12 col-md-10 text-decoration-none">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-4">Kesehatan Mental Remaja</h4>
                        <div class="text-center">
                            <img src="{{ asset('img/health-insurance.png') }}" class="w-25">
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
