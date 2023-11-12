@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('angkatan.show', $angkatan) }}" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <h1>{{ $title }} {{ $kelas->nama }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Data Siswa</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Detail {{ $kelas->nama }}</h2>
                <p class="section-lead">
                    {{ $kelas->nama }} - {{ $kelas->guru->nama }} <br>
                    TAHUN AJARAN {{ $kelas->angkatan->nama }}
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $title }}</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('siswa.create', [$angkatan, $kelas]) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-plus"></i>
                                        Tambah Siswa
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">NO</th>
                                                <th>NAMA</th>
                                                <th>NIS</th>
                                                <th>NISN</th>
                                                <th>JENIS KELAMIN</th>
                                                <th>TELEPON</th>
                                                <th>ANGKATAN</th>
                                                <th>OPTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($siswa as $item)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->nis }}</td>
                                                    <td>{{ $item->nisn }}</td>
                                                    <td>
                                                        @if ($item->jenis_kelamin === 'L')
                                                            Laki-laki
                                                        @elseif ($item->jenis_kelamin === 'P')
                                                            Perempuan
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->telepon }}</td>
                                                    <td>{{ $kelas->angkatan->nama }}</td>
                                                    <td>
                                                        <a href="{{ route('siswa.show', [$angkatan, $kelas, $item->slug]) }}" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="Lihat Data Siswa">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('siswa.edit', [$angkatan, $kelas, $item->slug]) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Data Siswa">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="{{ route('siswa.destroy', [$angkatan, $kelas, $item->slug]) }}" class="btn btn-sm btn-danger" data-confirm-delete="true"  data-toggle="tooltip" data-placement="top" title="Hapus Data Siswa">
                                                            <i class="fas fa-trash" onclick="event.preventDefault(); this.closest('a').click();"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
    <script>
        document.getElementById('btn-import').addEventListener('click', function () {
            $('#importSiswa').modal('show');
        });
    </script>
@endsection