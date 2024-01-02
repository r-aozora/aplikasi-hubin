@extends('layouts.app')

@section('link')
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
                    <div class="breadcrumb-item">Pengaturan</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Pengaturan Umum</h2>
                <p class="section-lead">
                    Pengaturan umum seperti, judul situs, deskripsi situs, alamat dan sebagainya.
                </p>
                <h2 class="section-title">Impor dan Ekspor</h2>
                <p class="section-lead">
                    Impor dan ekspor langsung tanpa harus ke halaman utama.
                </p>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="card-body">
                                <h4>Data Siswa</h4>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id, officia!</p>
                                <button class="btn btn-sm btn-success" data-toggle="tooltip" title="Download Data Siswa" onclick="$('#export-siswa').modal('show')">
                                    <i class="fas fa-download"></i>
                                </button>
                                <button class="btn btn-sm btn-info" data-toggle="tooltip" title="Impor Data Siswa" onclick="$('#import-siswa').modal('show')">
                                    <i class="fas fa-upload"></i>
                                </button>
                                <a href="{{ route('siswa.index') }}" class="card-cta float-right">
                                    Selengkapnya
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="card-body">
                                <h4>Data Program Keahlian</h4>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id, officia!</p>
                                <a href="#" class="btn btn-sm btn-success" data-toggle="tooltip" title="Download Data Program Keahlian">
                                    <i class="fas fa-download"></i>
                                </a>
                                <button class="btn btn-sm btn-info" data-toggle="tooltip" title="Impor Data Program Keahlian" onclick="$('#import-program').modal('show')">
                                    <i class="fas fa-upload"></i>
                                </button>
                                <a href="{{ route('program.index') }}" class="card-cta float-right">
                                    Selengkapnya
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-user-friends"></i>
                            </div>
                            <div class="card-body">
                                <h4>Data Guru</h4>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id, officia!</p>
                                <a href="{{ route('guru.export') }}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Download Data Guru">
                                    <i class="fas fa-download"></i>
                                </a>
                                <button class="btn btn-sm btn-info" data-toggle="tooltip" title="Impor Data Guru" onclick="$('#import-guru').modal('show')">
                                    <i class="fas fa-upload"></i>
                                </button>
                                <a href="{{ route('guru.index') }}" class="card-cta float-right">
                                    Selengkapnya
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="card-body">
                                <h4>Data Perusahaan</h4>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id, officia!</p>
                                <a href="{{ route('perusahaan.export') }}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Download Data Perusahaan">
                                    <i class="fas fa-download"></i>
                                </a>
                                <button class="btn btn-sm btn-info" data-toggle="tooltip" title="Impor Data Perusahaan" onclick="$('#import-perusahaan').modal('show')">
                                    <i class="fas fa-upload"></i>
                                </button>
                                <a href="{{ route('perusahaan.index') }}" class="card-cta float-right">
                                    Selengkapnya
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('dashboard.siswa.import')
        @include('dashboard.siswa.export')
        {{-- @include('dashboard.program.import') --}}
        @include('dashboard.guru.import')
        @include('dashboard.perusahaan.import')
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/choices.js/public/assets/scripts/choices.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-choices.js')}}"></script>
@endsection
