@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/choices.js/public/assets/styles/choices.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>
                    @if ($kelas['search'] !== null)
                        {{ $title . ' Kelas ' . $kelas['search']->nama }}
                    @else
                        {{ $title }}
                    @endif
                </h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Data Siswa</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ $title }}</h2>
                <p class="section-lead">
                    Anda dapat mengelola semua {{ $title }}, seperti mengedit, menghapus, dan lainnya.
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Siswa</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('siswa.create') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Tambah Data">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <button class="btn btn-sm btn-success" data-toggle="tooltip" title="Filter Data" onclick="$('#filter-siswa').modal('show');">
                                        <i class="fas fa-filter"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">NO</th>
                                                <th>NAMA SISWA</th>
                                                <th>NIS</th>
                                                <th>NISN</th>
                                                <th>JENIS KELAMIN</th>
                                                <th>TELEPON</th>
                                                <th>KELAS</th>
                                                <th>OPSI</th>
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
                                                    <td>{{ $item->kelas->nama }}</td>
                                                    <td>
                                                        <a href="{{ route('siswa.show', $item->slug) }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Lihat Data">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('siswa.edit', $item->slug) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit Data">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        <a href="{{ route('siswa.destroy', $item->slug) }}" class="btn btn-sm btn-danger" data-confirm-delete="true" data-toggle="tooltip" title="Hapus Data">
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
        @include('dashboard.siswa.filter')
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/modules/choices.js/public/assets/scripts/choices.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-choices.js')}}"></script>
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection
