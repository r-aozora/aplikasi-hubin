@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('guru.index') }}" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('guru.index') }}">Data Guru</a>
                    </div>
                    <div class="breadcrumb-item">Edit Data</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ $title }}</h2>
                <p class="section-lead">
                    Di halaman ini Anda dapat mengedit Data Guru dengan mengisi semua kolom.
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Data</h4>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{ $error }}</div>
                                    @endforeach
                                @endif
                                <form action="{{ route('guru.update', $guru->slug) }}" method="post" class="needs-validation" novalidate>
                                    @csrf
                                    @method('put')
                                    <div class="form-group row mb-4">
                                        <label for="nama_guru" class="col-form-label text-md-right col-12 col-md-3">Nama Guru</label>
                                        <div class="col-12 col-md-7">
                                            <input type="text" class="form-control @error('nama_guru') is-invalid @enderror" id="nama_guru" name="nama_guru" value="{{ $guru->nama }}" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="nip" class="col-form-label text-md-right col-12 col-md-3">NIP</label>
                                        <div class="col-12 col-md-7">
                                            <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{ $guru->nip }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="sebagai" class="col-form-label text-md-right col-12 col-md-3">Sebagai</label>
                                        <div class="col-12 col-md-7">
                                            <select class="form-control selectric" id="sebagai" name="sebagai" required>
                                                <option value="Walikelas" {{ $guru->sebagai === 'Walikelas' ? 'selected' : '' }}>Wali Kelas</option>
                                                <option value="Pendamping" {{ $guru->sebagai === 'Pendamping' ? 'selected' : '' }}>Guru Pendamping</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="telepon" class="col-form-label text-md-right col-12 col-md-3">No. Telepon</label>
                                        <div class="col-12 col-md-7">
                                            <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{ $guru->telepon }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3"></label>
                                        <div class="col-12 col-md-7">
                                            <button type="submit" class="btn btn-primary">Edit Data</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
@endsection