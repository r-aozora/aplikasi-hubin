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
                    <div class="breadcrumb-item">Edit Data</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ $title }}</h2>
                <p class="section-lead">
                    Di halaman ini Anda dapat mengedit Data User dengan mengisi semua kolom.
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
                                <form action="{{ route('user.update', $user->id) }}" method="post" class="needs-validation">
                                    @csrf
                                    @method('put')
                                    <div class="form-group row mb-4">
                                        <label for="nama_guru" class="col-form-label text-md-right col-12 col-md-3">Nama Guru</label>
                                        <div class="col-12 col-md-7">
                                            <select class="form-control choices" id="nama_guru" name="nama_guru" required>
                                                <option value="{{ $user->guru->id }}" selected>{{ $user->guru->nama }}</option>
                                                @foreach ($notUser as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="email" class="col-form-label text-md-right col-12 col-md-3">Email</label>
                                        <div class="col-12 col-md-7">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="username" class="col-form-label text-md-right col-12 col-md-3">Username</label>
                                        <div class="col-12 col-md-7">
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ $user->username }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="level" class="col-form-label text-md-right col-12 col-md-3">Level</label>
                                        <div class="col-12 col-md-7">
                                            <select class="form-control selectric" id="level" name="level">
                                                <option value="guru" {{ $user->level === 'guru' ? 'selected' : '' }}>Guru</option>
                                                <option value="admin" {{ $user->level === 'admin' ? 'selected' : '' }}>Admin</option>
                                            </select>
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
    <script src="{{ asset('assets/modules/choices.js/public/assets/scripts/choices.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-choices.js')}}"></script>
    <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
@endsection
