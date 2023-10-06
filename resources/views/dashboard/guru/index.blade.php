@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Guru</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Guru</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="card-title">
                                Data Guru
                            </h5>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#tambahGuru">
                                <i class="bi bi-plus-circle"></i>
                                Tambah    
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Sebagai</th>
                                <th>Telepon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gurus as $guru)
                                <tr>
                                    <td>{{ $guru->nama }}</td>
                                    <td>{{ $guru->nip }}</td>
                                    <td>{{ $guru->sebagai }}</td>
                                    <td>{{ $guru->telepon }}</td>
                                    <td>
                                        <div class="btn-group mb-1">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle me-1" type="button" id="dropdownMenuButtonIcon" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bi bi-error-circle me-50"></i> Opsi
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonIcon">
                                                    <a class="dropdown-item" href="{{ url('guru/'.$guru->id.'/edit') }}"><i class="bi bi-pencil-square me-50"></i> Edit</a>
                                                    {{-- <a class="dropdown-item" href="{{ url('guru/'.$guru->id) }}"><i class="bi bi-trash me-50"></i> Hapus</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $gurus->withQueryString()->links() }}
                </div>
            </div>
        </section>
    </div>
    @include('dashboard.guru.components.create')
@endsection