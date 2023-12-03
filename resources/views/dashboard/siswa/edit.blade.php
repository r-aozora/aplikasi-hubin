@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/choices.js/public/assets/styles/choices.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('siswa.index') }}" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('siswa.index') }}">Data Siswa</a>
                    </div>
                    <div class="breadcrumb-item">{{ $title }}</div>
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
                                <form action="{{ route('siswa.update', $siswa->slug) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="form-group row mb-4">
                                        <label for="nama_siswa" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Siswa</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $siswa->nama }}" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="nis" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIS</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" id="nis" name="nis" value="{{ $siswa->nis }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="nisn" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NISN</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $siswa->nisn }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="jenis_kelamin" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control selectric" id="jenis_kelamin" name="jenis_kelamin" required>
                                                <option value="L" {{ $siswa->jenis_kelamin === 'L' ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="P" {{ $siswa->jenis_kelamin === 'P' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="kelas" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kelas</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control choices" id="kelas" name="kelas" required>
                                                @foreach ($kelas as $item)
                                                    <option value="{{ $item->id }}" {{ $siswa->id_kelas === $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="telepon_siswa" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No. Telepon Siswa</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" id="telepon_siswa" name="telepon_siswa" value="{{ $siswa->telepon }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="telepon_orang_tua" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No. Telepon Orang Tua</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" id="telepon_orang_tua" name="telepon_orang_tua" value="{{ $siswa->telepon_ortu }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="email" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" id="email" name="email" value="{{ $siswa->email }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="alamat" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="form-control" id="alamat" name="alamat" rows="5" required>{{ $siswa->alamat }}</textarea>
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
    <script src="{{ asset('assets/modules/choices.js/public/assets/scripts/choices.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-choices.js')}}"></script>
    <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
@endsection