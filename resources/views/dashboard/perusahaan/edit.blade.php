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
                    Di halaman ini Anda dapat mengedit Data Perusahaan dengan mengisi semua kolom.
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
                                <form action="{{ route('perusahaan.update', $perusahaan->slug) }}" method="post" class="needs-validation" novalidate>
                                    @csrf
                                    @method('put')
                                    <div class="form-group row mb-4">
                                        <label for="nama_perusahaan" class="col-form-label text-md-right col-12 col-md-3">Nama Perusahaan</label>
                                        <div class="col-12 col-md-7">
                                            <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror" id="nama_perusahaan" name="nama_perusahaan" value="{{ $perusahaan->nama }}" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="penerima_surat" class="col-form-label text-md-right col-12 col-md-3">Penerima_surat Surat</label>
                                        <div class="col-12 col-md-7">
                                            <input type="text" class="form-control @error('penerima_surat') is-invalid @enderror" id="penerima_surat" name="penerima_surat" value="{{ $perusahaan->penerima }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="alamat" class="col-form-label text-md-right col-12 col-md-3">Alamat</label>
                                        <div class="col-12 col-md-7">
                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ $perusahaan->alamat }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="kecamatan" class="col-form-label text-md-right col-12 col-md-3">Kecamatan</label>
                                        <div class="col-12 col-md-7">
                                            <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" value="{{ $perusahaan->kecamatan }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="kota/kabupaten" class="col-form-label text-md-right col-12 col-md-3">Kota/Kabupaten</label>
                                        <div class="col-12 col-md-7">
                                            <input type="text" class="form-control @error('kota/kabupaten') is-invalid @enderror" id="kota/kabupaten" name="kota/kabupaten" value="{{ $perusahaan->kota }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="provinsi" class="col-form-label text-md-right col-12 col-md-3">Provinsi</label>
                                        <div class="col-12 col-md-7">
                                            <input type="text" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" value="{{ $perusahaan->provinsi }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="lokasi" class="col-form-label text-md-right col-12 col-md-3">Lokasi</label>
                                        <div class="col-12 col-md-7">
                                            <select class="form-control selectric" id="lokasi" name="lokasi" required>
                                                <option value="Dalam Kota" {{ $perusahaan->lokasi === 'Dalam Kota' ? 'selected' : '' }}>Dalam Kota</option>
                                                <option value="Luar Kota" {{ $perusahaan->lokasi === 'Luar Kota' ? 'selected' : '' }}>Luar Kota</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="telepon" class="col-form-label text-md-right col-12 col-md-3">No. Telepon</label>
                                        <div class="col-12 col-md-7">
                                            <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{ $perusahaan->telepon }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="koordinat" class="col-form-label text-md-right col-12 col-md-3">Koordinat</label>
                                        <div class="col-12 col-md-7">
                                            <input type="text" class="form-control @error('koordinat') is-invalid @enderror" id="koordinat" name="koordinat" value="{{ $perusahaan->koordinat }}">
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