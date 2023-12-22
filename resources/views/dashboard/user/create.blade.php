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
                    <a href="{{ route('user.index') }}" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('user.index') }}">Data User</a>
                    </div>
                    <div class="breadcrumb-item">Tambah Data</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ $title }}</h2>
                <p class="section-lead">
                    Di halaman ini Anda dapat membuat Data User baru dengan mengisi semua kolom.
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tambah Data</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.store') }}" method="post" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label for="nama_guru" class="col-form-label text-md-right col-12 col-md-3">Nama Guru</label>
                                        <div class="col-12 col-md-7">
                                            <select class="form-control choices" id="nama_guru" name="nama_guru" required>
                                                <option selected disabled>Nama Guru</option>
                                                @foreach ($notUser as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="email" class="col-form-label text-md-right col-12 col-md-3">Email</label>
                                        <div class="col-12 col-md-7">
                                            <input type="text" class="form-control" id="email" name="email" value="{{ Session::get('email') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="username" class="col-form-label text-md-right col-12 col-md-3">Username</label>
                                        <div class="col-12 col-md-7">
                                            <input type="text" class="form-control" id="username" name="username" value="{{ Session::get('username') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="password" class="col-form-label text-md-right col-12 col-md-3">Password</label>
                                        <div class="col-12 col-md-7">
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="level" class="col-form-label text-md-right col-12 col-md-3">Level</label>
                                        <div class="col-12 col-md-7">
                                            <select class="form-control selectric" id="level" name="level" required>
                                                <option selected disabled>Level</option>
                                                <option value="guru">Guru</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3"></label>
                                        <div class="col-12 col-md-7">
                                            <button type="submit" class="btn btn-primary">Tambah Data</button>
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
