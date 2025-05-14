@extends('layout.app')
@section('title', 'Data Pengguna')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4"> <i class="ti ti-user"></i> Daftar Pengguna Sistem </h5>
            <div class="d-lg-flex justify-content-lg-end mb-3 d-block">
                <div class="my-2">
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">
                            Tambah Data
                            <i class="ti ti-user-plus"></i>
                        </a>
                    @endif
                </div>
            </div>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle" cellspacing="0" id="myTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Tgl Lahir</th>
                            <th>Usia</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th class="text-center">Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-center" style="width:5%">
                                    {{ $loop->iteration }}</td>
                                <td>
                                    {{ $item->nama }}
                                </td>
                                <td>
                                    {{ $item->username }}
                                </td>
                                <td class="text-wrap">
                                    {{ $item->alamat }}
                                </td>
                                <td class="text-center">
                                    {{ $item->no_hp }}
                                </td>
                                <td class="text-center">
                                    {{ $item->format_tgl_lahir }}
                                </td>
                                <td class="text-center">
                                    {{ $item->usia }} Thn
                                </td>
                                <td class="text-center" style="width: 10%">
                                    @switch($item->jenis_kelamin)
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
                                </td>
                                <td class="text-center text-wrap">
                                    {{ $item->jabatan ?? '-' }}
                                </td>
                                <td class="text-center" style="width: 10%">
                                    @switch($item->role)
                                        @case('admin')
                                            <span class="badge rounded-pill text-bg-success">Administrator</span>
                                        @break

                                        @case('petugas')
                                            <span class="badge rounded-pill text-bg-secondary">Petugas</span>
                                        @break

                                        @case('kader')
                                            <span class="badge rounded-pill text-bg-warning">Kader</span>
                                        @break

                                        @case('user')
                                            <span class="badge rounded-pill text-bg-primary">Peserta</span>
                                        @break

                                        @default
                                            <span class="badge rounded-pill text-bg-danger">{{ $item->role }}</span>
                                        @break
                                    @endswitch
                                </td>
                                <td class="text-center" style="width: 10%">
                                    <div class="d-flex row justify-content-center">
                                        <a class="btn btn-success btn-sm m-1" href="{{ route('user.edit', $item->id) }}">
                                            Edit <i class="ti ti-edit ms-2"></i>
                                        </a>
                                        @if (Auth::user()->role == 'admin')
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger btn-sm m-1" data-bs-toggle="modal"
                                                data-bs-target="#model_delete{{ $item->id }}"
                                                {{ Auth::id() == $item->id ? 'disabled' : '' }}>
                                                Hapus <i class="ti ti-trash"></i>
                                            </button>
                                        @endif
                                    </div>
                                    @if (Auth::user()->role == 'admin')
                                        <!-- Modal -->
                                        <div class="modal fade" id="model_delete{{ $item->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('user.destroy', $item->id) }}" method="POST">
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
                {{-- <div class="my-2">
                    <a href="{{ route('user.report') }}" class="btn btn-danger btn-sm" target="_blank">Cetak
                        <i class="ti ti-file ms-1"></i></a>
                </div> --}}
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
