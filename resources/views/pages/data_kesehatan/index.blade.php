@extends('layout.app')
@section('title', 'Data Kesehatan')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4"> <i class="ti ti-heartbeat"></i> Data Kesehatan </h5>
            <div class="d-lg-flex justify-content-lg-end mb-3 d-block">
                <div class="my-2">
                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kader')
                        <a href="{{ route('data-kesehatan.create') }}" class="btn btn-primary btn-sm">
                            Tambah Data
                            <i class="ti ti-plus"></i>
                        </a>
                    @endif
                </div>
            </div>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle" cellspacing="0" id="myTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Peserta</th>
                            <th>Usia</th>
                            <th>Tanggal Pemeriksaan</th>
                            <th>Tinggi Badan</th>
                            <th>Berat Badan</th>
                            <th>Lingkar Lengan</th>
                            <th>Lingkar Perut</th>
                            <th>Tekanan Darah</th>
                            <th>Pengecekan Anemia</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-center" style="width:5%">
                                    {{ $loop->iteration }}</td>
                                <td>
                                    {{ $item->user->nama }}
                                </td>
                                <td>
                                    {{ $item->user->usia }} Thn
                                </td>
                                <td>
                                    <span class="fw-bold">{{ $item->format_tgl_pemeriksaan }}</span> <br>
                                    oleh <small> <i>{{ $item->kader->nama }} </i></small>
                                </td>
                                <td>
                                    {{ $item->tinggi_badan }} cm
                                </td>
                                <td>
                                    {{ $item->berat_badan }} kg
                                </td>
                                <td>
                                    {{ $item->lingkar_lengan }} cm
                                </td>
                                <td>
                                    {{ $item->lingkar_perut }} cm
                                </td>
                                <td>
                                    {{ $item->tekanan_darah }} mmHg
                                </td>
                                <td>
                                    {{ $item->pengecekan_anemia }}
                                </td>
                                <td class="text-center" style="width: 10%">
                                    <div class="d-flex row justify-content-center">
                                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kader')
                                            <a class="btn btn-success btn-sm m-1"
                                                href="{{ route('data-kesehatan.edit', $item->id) }}">
                                                Edit <i class="ti ti-edit ms-2"></i>
                                            </a>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger btn-sm m-1" data-bs-toggle="modal"
                                                data-bs-target="#model_delete{{ $item->id }}">
                                                Hapus <i class="ti ti-trash"></i>
                                            </button>
                                        @endif
                                    </div>
                                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kader')
                                        <!-- Modal -->
                                        <div class="modal fade" id="model_delete{{ $item->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('data-kesehatan.destroy', $item->id) }}"
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
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
