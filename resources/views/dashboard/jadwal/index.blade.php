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
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Jadwal & Periode</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Kelola Jadwal Prakerin</h2>
                <p class="section-lead">
                    Anda dapat mengelola semua Jadwal Prakerin, seperti mengedit, menghapus, dan lainnya.
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Jadwal Prakerin</h4>
                                <div class="card-header-action">
                                    <button class="btn btn-sm btn-primary" data-toggle="tooltip" title="Tambah Data" onclick="$('#create-jadwal').modal('show');">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    <button class="btn btn-sm btn-success" data-toggle="tooltip" title="Filter Data" onclick="$('#filter-jadwal').modal('show');">
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
                                                <th>KELAS</th>
                                                <th>TAHUN ANGKATAN</th>
                                                <th>PERIODE PRAKERIN</th>
                                                <th>OPSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jadwal as $item)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $item->kelas->nama }}</td>
                                                    <td>{{ $item->kelas->angkatan->nama }}</td>
                                                    <td>{{ date('j F Y', strtotime($item->periode->awal)) . ' s/d ' . date('j F Y', strtotime($item->periode->akhir)) }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-warning btn-edit-jadwal" data-modal-id="{{ $item->id }}" data-toggle="tooltip" title="Edit Data">
                                                            <i class="fas fa-pen"></i>
                                                        </button>
                                                        <a href="{{ route('jadwal.destroy', $item->id) }}" class="btn btn-sm btn-danger" data-confirm-delete="true" data-toggle="tooltip" title="Hapus Data">
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
                @include('dashboard.periode.index')
            </div>
        </section>
        @include('dashboard.jadwal.filter')
        @include('dashboard.jadwal.create')
        @include('dashboard.periode.create')
        @include('dashboard.jadwal.edit')
        @include('dashboard.periode.edit')
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/modules/choices.js/public/assets/scripts/choices.js') }}"></script>
    
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-choices.js')}}"></script>

    <script>
        $('.btn-edit-periode').click(function() {
            let id = $(this).data('modal-id');
            $(`#edit-periode-${id}`).modal('show');
        });

        $('.btn-edit-jadwal').click(function() {
            let id = $(this).data('modal-id');
            $(`#edit-jadwal-${id}`).modal('show');
        });
    </script>
@endsection