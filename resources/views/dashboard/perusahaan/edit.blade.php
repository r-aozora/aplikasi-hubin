@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('perusahaan.index') }}" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('perusahaan.index') }}">Data Perusahaan</a>
                    </div>
                    <div class="breadcrumb-item">Edit Data</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ $title }}</h2>
                <p class="section-lead">
                    On this page you can create a new post and fill in all fields.
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $title }}</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('perusahaan.update', $perusahaan->slug) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Perusahaan</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="nama" value="{{ $perusahaan->nama }}" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penerima Surat</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="penerima" value="{{ $perusahaan->penerima }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="alamat" value="{{ $perusahaan->alamat }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kecamatan</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="kecamatan" value="{{ $perusahaan->kecamatan }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota/Kabupaten</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="kota" value="{{ $perusahaan->kota }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Provinsi</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="provinsi" value="{{ $perusahaan->provinsi }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control selectric" name="lokasi" required>
                                                <option value="Dalam" {{ $perusahaan->lokasi === 'Dalam' ? 'selected' : '' }}>Dalam Kota</option>
                                                <option value="Luar" {{ $perusahaan->lokasi === 'Luar' ? 'selected' : '' }}>Luar Kota</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No. Telepon</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="telepon" value="{{ $perusahaan->telepon }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Koordinat</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="koordinat" value="{{ $perusahaan->koordinat }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
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