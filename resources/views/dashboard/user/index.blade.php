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
                    <div class="breadcrumb-item">Data User</div>
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
                                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-plus"></i> 
                                        Tambah Data
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
                                                <th>USERNAME</th>
                                                <th>LEVEL</th>
                                                <th>OPSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $item)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $item->guru->nama }}</td>
                                                    <td>{{ $item->username }}</td>
                                                    <td>{{ $item->level }}</td>
                                                    <td>
                                                        @if ($item->id !== Auth::id())
                                                            <a href="{{ route('user.edit', $item->id) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Data user">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="{{ route('user.destroy', $item->id) }}" class="btn btn-sm btn-danger" data-confirm-delete="true"  data-toggle="tooltip" data-placement="top" title="Hapus Data user">
                                                                <i class="fas fa-trash" onclick="event.preventDefault(); this.closest('a').click()";></i>
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
@endsection

@section('script')
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection