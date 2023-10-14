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
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card text-center">
                    <div class="card-header">
                        <h5 class="card-title">Data Guru</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#importGuru">
                                <i class="bi bi-upload"></i>
                                Impor Data Guru
                            </button>
                            <a href="{{ route('guru.export') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-download"></i>
                                Download Data Guru
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="card text-center">
                    <div class="card-header">
                        <h4 class="card-title">Data Siswa</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#importSiswa">
                                <i class="bi bi-upload"></i>
                                Impor Data Siswa
                            </button>
                            <a href="{{ url('/') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-download"></i>
                                Download Data Siswa
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="card text-center">
                    <div class="card-header">
                        <h4 class="card-title">Data Perusahaan</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#importPerusahaan">
                                <i class="bi bi-upload"></i>
                                Impor Data Perusahaan
                            </button>
                            <a href="{{ route('perusahaan.export') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-download"></i>
                                Download Data Perusahaan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="card text-center">
                    <div class="card-header">
                        <h4 class="card-title">Data Monitoring</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <a href="{{ url('/') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-download"></i>
                                Download Data Monitoring
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.guru.import')
        @include('dashboard.perusahaan.import')

        <div class="row">
            @include('dashboard.data.program.index')
            @include('dashboard.data.angkatan.index')
        </div>
    </div>
@endsection