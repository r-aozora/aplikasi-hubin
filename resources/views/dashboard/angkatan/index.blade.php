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
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Data Angkatan</div>
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
                                <h4>Data Angkatan</h4>
                                <div class="card-header-action">
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create-angkatan">
                                        <i class="fas fa-plus"></i>
                                        Tambah Data
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-2">
                                        <thead>
                                            <tr>
                                                <th class="text-center">NO</th>
                                                <th>TAHUN ANGKATAN</th>
                                                <th>JUMLAH KELAS</th>
                                                <th>OPTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($angkatan as $item)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->kelas_count }}</td>
                                                    <td>
                                                        <form action="{{ route('kelas.index') }}" method="get" class="d-inline">
                                                            <input type="hidden" name="id_angkatan" value="{{ $item->id }}">
                                                            <button type="submit" class="btn btn-sm btn-info">
                                                                <i class="fas fa-eye"></i>
                                                            </button>
                                                        </form>
                                                        <button class="btn btn-sm btn-warning btn-edit" data-modal-slug="{{ $item->slug }}" data-toggle="tooltip" title="Edit Data">
                                                            <i class="fas fa-pen"></i>
                                                        </button>
                                                        <a href="{{ route('angkatan.destroy', $item->slug) }}" class="btn btn-sm btn-danger" data-confirm-delete="true" data-toggle="tooltip" title="Hapus Data">
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
        @include('dashboard.angkatan.create')
        @include('dashboard.angkatan.edit')
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
        $('.btn-edit').click(function() {
            let slug = $(this).data('modal-slug');
            $(`#edit-${slug}`).modal('show');
        });
    </script>
@endsection
