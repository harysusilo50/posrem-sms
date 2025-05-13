<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Pengguna Sistem Posyandu Remaja Srengseng Menuju Sehat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Data Pengguna Sistem Posyandu Remaja Srengseng Menuju Sehat</h4>
        </h5>
    </center>

    <table class='table table-bordered' width="100%" style="table-layout:fixed;">
        <thead class="bg-secondary text-white">
            <tr>
                <th class="text-center align-middle">No.</th>
                <th class="text-center align-middle">Nama</th>
                <th class="text-center align-middle">Usia</th>
                <th class="text-center align-middle">Tgl Lahir</th>
                <th class="text-center align-middle">Alamat</th>
                <th class="text-center align-middle">Username</th>
                <th class="text-center align-middle">No HP</th>
                <th class="text-center align-middle">Jenis Kelamin</th>
                <th class="text-center align-middle">Jabatan</th>
                <th class="text-center align-middle">Role</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($user as $item)
                <tr>
                    <td class="text-center" style="width:5%">{{ $i++ }}</td>
                    <td>
                        {{ $item->nama }}
                    </td>
                    <td class="text-center" style="width: 5%">
                        {{ $item->usia }} Thn
                    </td>
                    <td class="text-center">
                        {{ $item->tgl_lahir }}
                    </td>
                    <td >
                        {{ $item->alamat }}
                    </td>
                    <td>
                        {{ $item->username }}
                    </td>
                    <td class="text-center">
                        {{ $item->no_hp }}
                    </td>

                    <td class="text-center" style="width: 5%">
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
                    <td class="text-center">
                        {{ $item->jabatan }}
                    </td>
                    <td class="text-center">
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
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
