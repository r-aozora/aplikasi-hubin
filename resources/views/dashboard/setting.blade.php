@extends('layouts.app')

@section('link')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Kelola Data</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ $title }}</h2>
                <p class="section-lead">
                    Organize and adjust all settings about this site.
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
                                <a href="#" class="btn btn-sm btn-success" data-toggle="tooltip" title="Download Data Siswa">
                                    <i class="fas fa-download"></i>
                                </a>
                                <button class="btn btn-sm btn-info" id="btn-import-" data-toggle="tooltip" title="Impor Data Siswa">
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
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="card-body">
                                <h4>Data Kelas</h4>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id, officia!</p>
                                <a href="{{ route('kelas.index') }}" class="card-cta float-right">
                                    Selengkapnya
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="card-body">
                                <h4>Data Angkatan</h4>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id, officia!</p>
                                <a href="{{ route('angkatan.index') }}" class="card-cta float-right">
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
                                <button class="btn btn-sm btn-info" id="btn-import-program" data-toggle="tooltip" title="Impor Data Program Keahlian">
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
                                <a href="#" class="btn btn-sm btn-success" data-toggle="tooltip" title="Download Data Guru">
                                    <i class="fas fa-download"></i>
                                </a>
                                <button class="btn btn-sm btn-info" id="btn-import-guru" data-toggle="tooltip" title="Impor Data Guru">
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
                                <a href="#" class="btn btn-sm btn-success" data-toggle="tooltip" title="Download Data Perusahaan">
                                    <i class="fas fa-download"></i>
                                </a>
                                <button class="btn btn-sm btn-info" id="btn-import-perusahaan" data-toggle="tooltip" title="Impor Data Perusahaan">
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

        @include('dashboard.guru.import')
        @include('dashboard.perusahaan.import')
    </div>
@endsection

@section('script')
    <script>
        document.getElementById('btn-import-guru').addEventListener('click', function() {
            $('#importGuru').modal('show');
        });

        document.getElementById('btn-import-perusahaan').addEventListener('click', function() {
            $('#importPerusahaan').modal('show');
        });

        document.getElementById('btn-import-program').addEventListener('click', function() {
            $('#importProgram').modal('show');
        })
    </script>
@endsection
