@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, {{ Auth::user()->guru->nama }}!</h2>
            <p class="section-lead">
                Ubah informasi tentang diri Anda di halaman ini.
            </p>
            <div class="row mt-sm-4">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('profile.update_profile', Auth::user()->guru->id) }}" method="post" class="needs-validation" novalidate="">
                            @csrf
                            @method('put')
                            <div class="card-header">
                                <h4>Informasi Profil</h4>
                            </div>
                            <div class="card-body">
                                <p>Perbarui informasi profil Anda.</p>
                                <div class="row">
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ Auth::user()->guru->nama }}" required>
                                        <div class="invalid-feedback">
                                            Silakan isi Nama Anda
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="nip">NIP</label>
                                        <input type="text" class="form-control" id="nip" name="nip" value="{{ Auth::user()->guru->nip }}" required>
                                        <div class="invalid-feedback">
                                            Silakan isi NIP Anda
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="sebagai">Sebagai</label>
                                        <select name="sebagai" id="sebagai" class="form-control selectric">
                                            <option value="Walikelas" {{ Auth::user()->guru->sebagai === 'Walikelas' ? 'selected' : '' }}>Wali Kelas</option>
                                            <option value="Pendamping" {{ Auth::user()->guru->sebagai === 'Pendamping' ? 'selected' : '' }}>Pendamping</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="telepon">No. Telepon</label>
                                        <input type="text" class="form-control" id="telepon" name="telepon" value="{{ Auth::user()->guru->telepon }}" required>
                                        <div class="invalid-feedback">
                                            Silakan isi No. Telepon Anda
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('profile.update_account') }}" method="post" class="needs-validation" novalidate="">
                            @csrf
                            @method('patch')
                            <div class="card-header">
                                <h4>Informasi Akun</h4>
                            </div>
                            <div class="card-body">
                                <p>Perbarui alamat email dan username akun Anda.</p>
                                <div class="row">
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                                        <div class="invalid-feedback">
                                            Silakan isi email Anda
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" value="{{ Auth::user()->username }}">
                                        <div class="invalid-feedback">
                                            Silakan isi username Anda
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('password.update') }}" method="post" class="needs-validation" novalidate="">
                            @csrf
                            @method('put')
                            <div class="card-header">
                                <h4>Perbarui Password</h4>
                            </div>
                            <div class="card-body">
                                <p>Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.</p>
                                <div class="row">
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="current_password">Password Saat Ini</label>
                                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                                        @error('current_password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="password">Password Baru</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="password_confirmation">Konfirmasi Password</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
@endsection