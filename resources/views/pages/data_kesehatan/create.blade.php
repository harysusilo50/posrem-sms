@extends('layout.app')
@section('title', 'Tambah Data Kesehatan')
@section('content')
    <div class="card shadow mb-4">
        <!-- Card Body -->
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4"> <i class="ti ti-heartbeat"></i> Tambah Data Kesehatan </h5>
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
            <form method="POST" action="{{ route('data-kesehatan.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label class="col-form-label" for="user_id" style="font-weight: 500">Pilih Peserta</label>
                            <select id="user_id" class="form-control form-select" name="user_id" required>
                                <option value="" selected>- Pilih Data Peserta -</option>
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}"> {{ $item->nama }} ({{ $item->usia }} Thn)
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label class="col-form-label" for="kader_id" style="font-weight: 500">Pilih Kader</label>
                            <select id="kader_id" class="form-control form-select" name="kader_id" required>
                                <option value="" selected>- Pilih Data Kader -</option>
                                @foreach ($kader as $item)
                                    <option value="{{ $item->id }}"> {{ $item->nama }} - {{ $item->jabatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label class="col-form-label" for="tinggi_badan" style="font-weight: 500">Tinggi Badan</label>
                            <div class="input-group">
                                <input type="number" step="0.01" name="tinggi_badan" class="form-control" required placeholder="contoh : 168.5"
                                    id="tinggi_badan">
                                <span class="input-group-text">cm</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label class="col-form-label" for="berat_badan" style="font-weight: 500">Berat Badan</label>
                            <div class="input-group">
                                <input type="number" step="0.01" name="berat_badan" class="form-control" required placeholder="contoh : 67.3"
                                    id="berat_badan">
                                <span class="input-group-text">kg</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label class="col-form-label" for="lingkar_lengan" style="font-weight: 500">Lingkar
                                Lengan</label>
                            <div class="input-group">
                                <input type="number" step="0.01" name="lingkar_lengan" class="form-control" required placeholder="contoh : 22.4"
                                    id="lingkar_lengan">
                                <span class="input-group-text">cm</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label class="col-form-label" for="lingkar_perut" style="font-weight: 500">Lingkar Perut</label>
                            <div class="input-group">
                                <input type="number" step="0.01" name="lingkar_perut" class="form-control" required placeholder="contoh : 80.5"
                                    id="lingkar_perut">
                                <span class="input-group-text">cm</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label class="col-form-label" for="tekanan_darah" style="font-weight: 500">Tekanan Darah</label>
                            <div class="input-group">
                                <input type="text" name="tekanan_darah" class="form-control"
                                    required placeholder="contoh : 120/80" id="tekanan_darah">
                                <span class="input-group-text">mmHg</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label class="col-form-label" for="pengecekan_anemia" style="font-weight: 500">Pengecekan
                                Anemia</label>
                            <input type="text" name="pengecekan_anemia" class="form-control" id="pengecekan_anemia" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label class="col-form-label" for="tgl_pemeriksaan" style="font-weight: 500">Tanggal
                                Pemeriksaan</label>
                            <input type="date" name="tgl_pemeriksaan" class="form-control" id="tgl_pemeriksaan" required>
                        </div>
                    </div>
                </div>

                {{-- Tombol Submit --}}
                <div class="form-group col-12 text-center my-4">
                    <a href="{{ route('data-kesehatan.index') }}" class="btn btn-light text-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
