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
                    @if ($angkatan['search'] !== null)
                        {{ $title . ' Tahun Angkatan ' . $angkatan['search']->nama }}
                    @else
                        {{ $title }}
                    @endif
                </h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Data Kelas</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Kelola {{ $title }}</h2>
                <p class="section-lead">
                    Anda dapat mengelola semua {{ $title }}, seperti mengedit, menghapus, dan lainnya.
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Kelas</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('kelas.create') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Tambah Data">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <button class="btn btn-sm btn-success" data-toggle="tooltip" title="Filter Data" onclick="$('#filter-kelas').modal('show');">
                                        <i class="fas fa-filter"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-2">
                                        <thead>
                                            <tr>
                                                <th class="text-center">NO</th>
                                                <th>NAMA KELAS</th>
                                                <th>TAHUN ANGKATAN</th>
                                                <th>PROGRAM KEAHLIAN</th>
                                                <th>JUMLAH SISWA</th>
                                                <th>OPSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kelas as $item)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->angkatan->nama }}</td>
                                                    <td>{{ $item->program->nama }}</td>
                                                    <td>{{ $item->siswa_count }}</td>
                                                    <td>
                                                        <form action="{{ route('siswa.index') }}" method="get" class="d-inline">
                                                            <input type="hidden" name="id_kelas" value="{{ $item->id }}">
                                                            <button type="submit" class="btn btn-sm btn-info" data-toggle="tooltip" title="Detail Data">
                                                                <i class="fas fa-eye"></i>
                                                            </button>
                                                        </form>
                                                        <a href="{{ route('kelas.edit', $item->slug) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit Data">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        <a href="{{ route('kelas.destroy', $item->slug) }}" class="btn btn-sm btn-danger" data-confirm-delete="true" data-toggle="tooltip" title="Hapus Data">
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
        @include('dashboard.kelas.filter')
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
