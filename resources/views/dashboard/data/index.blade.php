@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Kelola Data</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kelola Data</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section id="data-program" class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="card-title">
                                Program Keahlian
                            </h5>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#tambahProgram">
                                <i class="bi bi-plus-circle"></i>
                                Tambah Program
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>KODE</th>
                                <th>PROGRAM KEAHLIAN</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $program->firstItem() ?>
                            @foreach ($program as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        <div class="btn-group mb-1">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle me-1" type="button" id="option" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bi bi-error-circle me-50"></i>
                                                    Opsi
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="option">
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editProgram{{ $item->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                        Edit
                                                    </button>
                                                    <a href="{{ route('program.destroy', $item->id) }}" class="dropdown-item" data-confirm-delete="true">
                                                        <i class="bi bi-trash"></i>
                                                        Hapus
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $program->withQueryString()->links() }}
                </div>
            </div>
        </section>

        <section id="data-angkatan" class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="card-title">
                                Tahun Angkatan
                            </h5>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#tambahAngkatan">
                                <i class="bi bi-plus-circle"></i>
                                Tambah Angkatan
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>KODE</th>
                                <th>TAHUN ANGKATAN</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $angkatan->firstItem() ?>
                            @foreach ($angkatan as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        <div class="btn-group mb-1">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle me-1" type="button" id="option" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bi bi-error-circle me-50"></i>
                                                    Opsi
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="option">
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editAngkatan{{ $item->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                        Edit
                                                    </button>
                                                    <a href="{{ route('angkatan.destroy', $item->id) }}" class="dropdown-item" data-confirm-delete="true">
                                                        <i class="bi bi-trash"></i>
                                                        Hapus
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $angkatan->withQueryString()->links() }}
                </div>
            </div>
        </section>
    </div>

    @include('dashboard.data.angkatan.create')
    @include('dashboard.data.program.create')
@endsection
