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
                    <div class="breadcrumb-item">Data Guru</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Kelola {{ $title }}</h2>
                <p class="section-lead">
                    We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $title }}</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('guru.create') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Tambah Data Guru">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <a href="{{ route('guru.export') }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Download Data Guru">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <button class="btn btn-sm btn-info" id="btn-import" data-toggle="tooltip" data-placement="top" title="Impor Data Guru">
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
                                                <th>NAMA GURU</th>
                                                <th>NIP</th>
                                                <th>SEBAGAI</th>
                                                <th>TELEPON</th>
                                                <th>OPSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($guru as $item)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->nip }}</td>
                                                    <td>{{ $item->sebagai }}</td>
                                                    <td>{{ $item->telepon }}</td>
                                                    <td>
                                                        @if ($item->id !== Auth::id())
                                                            {{-- <a href="{{ route('guru.show', $item->slug) }}" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="Lihat Data Guru">
                                                                <i class="fas fa-eye"></i>
                                                            </a> --}}
                                                            <a href="{{ route('guru.edit', $item->slug) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Data Guru">
                                                                <i class="fas fa-pen"></i>
                                                            </a>
                                                            <a href="{{ route('guru.destroy', $item->slug) }}" class="btn btn-sm btn-danger" data-confirm-delete="true"  data-toggle="tooltip" data-placement="top" title="Hapus Data Guru">
                                                                <i class="fas fa-trash" onclick="event.preventDefault(); this.closest('a').click();"></i>
                                                            </a>
                                                        @endif
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

    @include('dashboard.guru.import')
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
            $('#importGuru').modal('show');
        });
    </script>
@endsection