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
                    <div class="breadcrumb-item">Data Perusahaan</div>
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
                                <h4>{{ $title }}</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('perusahaan.create') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Tambah Data">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <a href="{{ route('perusahaan.export') }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Download Data">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <button class="btn btn-sm btn-info" data-toggle="tooltip" title="Impor Data" onclick="$('#import-perusahaan').modal('show')">
                                        <i class="fas fa-upload"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">NO</th>
                                                <th>PERUSAHAAN</th>
                                                <th>ALAMAT</th>
                                                <th>LOKASI</th>
                                                <th>TELEPON</th>
                                                <th>OPSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($perusahaan as $item)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->alamat . ', Kec. ' . $item->kecamatan . ', ' . $item->kota . ', ' . $item->provinsi }}</td>
                                                    <td>{{ $item->lokasi }}</td>
                                                    <td>{{ $item->telepon }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            OPSI
                                                        </button>
                                                        <div class="dropdown-menu dropleft">
                                                            <a class="dropdown-item has-icon" href="{{ route('perusahaan.show', $item->slug) }}">
                                                                <i class="fas fa-eye"></i>
                                                                Detail
                                                            </a>
                                                            <a class="dropdown-item has-icon" href="{{ route('perusahaan.edit', $item->slug) }}">
                                                                <i class="fas fa-pen"></i>
                                                                Edit
                                                            </a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item has-icon text-danger" href="{{ route('perusahaan.destroy', $item->slug) }}" data-confirm-delete="true">
                                                                <i class="fas fa-trash" onclick="event.preventDefault(); this.closest('a').click();"></i>
                                                                Hapus
                                                            </a>
                                                        </div>
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

    @include('dashboard.perusahaan.import')
@endsection

@section('script')
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection