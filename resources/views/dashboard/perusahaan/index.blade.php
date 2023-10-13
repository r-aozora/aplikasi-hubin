@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Perusahaan</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Peusahaan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="card-title">
                                Data Perusahaan
                            </h5>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#tambahPerusahaan">
                                <i class="bi bi-plus-circle"></i>
                                Tambah Perusahaan
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>PERUSAHAAN</th>
                                <th>ALAMAT</th>
                                <th>LOKASI</th>
                                <th>TELEPON</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $perusahaan->firstItem() ?>
                            @foreach ($perusahaan as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->lokasi }}</td>
                                    <td>{{ $item->telepon }}</td>
                                    <td>
                                        <div class="btn-group mb-1">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle me-1" type="button" id="option" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bi bi-error-circle me-50"></i>
                                                    Opsi
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="option">
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="detailPerusahaan{{ $item->id }}">
                                                        <i class="bi bi-person-square"></i>
                                                        Detail
                                                    </button>
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editPerusahaan{{ $item->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                        Edit
                                                    </button>
                                                    <a href="{{ route('perusahaan.destroy', $item->id) }}" class="dropdown-item" data-confirm-delete="true">
                                                        <i class="bi bi-trash"></i>
                                                        Hapus
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- @include('dashboard.perusahaan.edit') --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $perusahaan->withQueryString()->links() }}
                </div>
            </div>
        </section>
    </div>
    {{-- @include('dashboard.perusahaan.create') --}}
@endsection