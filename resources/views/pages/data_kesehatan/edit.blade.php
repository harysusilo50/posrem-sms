@extends('layout.app')
@section('title', 'Edit Data Kesehatan')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4"> <i class="ti ti-heartbeat"></i> Edit Data Kesehatan </h5>

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

            <form method="POST" action="{{ route('data-kesehatan.update', $data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label class="col-form-label" for="user_id" style="font-weight: 500">Pilih Peserta</label>
                            <select id="user_id" class="form-control form-select" name="user_id" required>
                                <option value="">- Pilih Data Peserta -</option>
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $data->user_id ? 'selected' : '' }}>
                                        {{ $item->nama }} ({{ $item->usia }} Thn)
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label class="col-form-label" for="kader_id" style="font-weight: 500">Pilih Kader</label>
                            <select id="kader_id" class="form-control form-select" name="kader_id" required>
                                <option value="">- Pilih Data Kader -</option>
                                @foreach ($kader as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $data->kader_id ? 'selected' : '' }}>
                                        {{ $item->nama }} - {{ $item->jabatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label for="tinggi_badan" class="col-form-label" style="font-weight: 500">Tinggi Badan</label>
                            <div class="input-group">
                                <input type="number" name="tinggi_badan" class="form-control" id="tinggi_badan" required
                                    value="{{ $data->tinggi_badan }}" placeholder="contoh : 168.5" step="0.01">
                                <span class="input-group-text">cm</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label for="berat_badan" class="col-form-label" style="font-weight: 500">Berat Badan</label>
                            <div class="input-group">
                                <input type="number" name="berat_badan" class="form-control" id="berat_badan" required
                                    value="{{ $data->berat_badan }}" placeholder="contoh : 67.3" step="0.01">
                                <span class="input-group-text">kg</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label for="lingkar_lengan" class="col-form-label" style="font-weight: 500">Lingkar
                                Lengan</label>
                            <div class="input-group">
                                <input type="number" name="lingkar_lengan" class="form-control" id="lingkar_lengan"
                                    required value="{{ $data->lingkar_lengan }}" placeholder="contoh : 22.4" step="0.01">
                                <span class="input-group-text">cm</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label for="lingkar_perut" class="col-form-label" style="font-weight: 500">Lingkar Perut</label>
                            <div class="input-group">
                                <input type="number" name="lingkar_perut" class="form-control" id="lingkar_perut" required
                                    value="{{ $data->lingkar_perut }}" placeholder="contoh : 80.5" step="0.01">
                                <span class="input-group-text">cm</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label for="tekanan_darah" class="col-form-label" style="font-weight: 500">Tekanan Darah</label>
                            <div class="input-group">
                                <input type="text" name="tekanan_darah" class="form-control" id="tekanan_darah" required
                                    value="{{ $data->tekanan_darah }}" placeholder="contoh : 120/80">
                                <span class="input-group-text">mmHg</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label for="pengecekan_anemia" class="col-form-label" style="font-weight: 500">Pengecekan
                                Anemia</label>
                            <input type="text" name="pengecekan_anemia" class="form-control" id="pengecekan_anemia"
                                required value="{{ $data->pengecekan_anemia }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label for="tgl_pemeriksaan" class="col-form-label" style="font-weight: 500">Tanggal
                                Pemeriksaan</label>
                            <input type="date" name="tgl_pemeriksaan" class="form-control" id="tgl_pemeriksaan"
                                required value="{{ $data->tgl_pemeriksaan }}">
                        </div>
                    </div>
                </div>

                <div class="form-group col-12 text-center my-4">
                    <a href="{{ route('data-kesehatan.index') }}" class="btn btn-light text-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
