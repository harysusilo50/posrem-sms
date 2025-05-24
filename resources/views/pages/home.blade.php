@extends('layout.app')
@section('title', 'Dashboard')
@section('content')
  <div class="bg-light rounded-3 py-3 position-relative">
        <div class="bg-primary mx-5 rounded mb-5 py-1">
            <h2 class="text-center fw-bold text-white">🌟 SELAMAT DATANG 🌟<br> DI POSYANDU REMAJA SRENGSENG MENUJU SEHAT</h2>
        </div>
        <div class="position-absolute top-50 start-50 translate-middle">
            <img src="{{ asset('img/healthcare.png') }}" style="width: 180px">
        </div>
        <div class="row d-flex justify-content-center">

            <div class="col-10 col-lg-6 d-flex justify-content-center">
                <a href="{{ route('penyuluhan.artikel_kesehatan.index') }}" class="card col-12 col-md-6 text-decoration-none">
                    <div class="card-body">
                        <h4 class="card-title text-center my-auto">KENALI JENIS KESEHATANMU</h4>
                    </div>
                </a>
            </div>
            <div class="col-10 col-lg-6 d-flex justify-content-center">
                <a href="{{ route('data-kesehatan.index') }}" class="card col-12 col-md-6 text-decoration-none">
                    <div class="card-body">
                        <h4 class="card-title text-center my-auto">CEK KESEHATAN FISIK DAN MENTAL</h4>
                    </div>
                </a>
            </div>
            <div class="col-10 col-lg-6 d-flex justify-content-center">
                <a href="{{ route('penyuluhan.index') }}" class="card col-12 col-md-6 text-decoration-none">
                    <div class="card-body">
                        <h4 class="card-title text-center my-auto">PENYULUHAN</h4>
                    </div>
                </a>
            </div>
            <div class="col-10 col-lg-6 d-flex justify-content-center">
                <a href="{{ route('konsultasi.index') }}" class="card col-12 col-md-6 text-decoration-none">
                    <div class="card-body">
                        <h4 class="card-title text-center my-auto">KONSULTASI MASALAH REMAJA</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
