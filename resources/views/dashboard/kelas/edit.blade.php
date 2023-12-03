@extends('layouts.app')

@section('link')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('kelas.index') }}" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('kelas.index') }}">Data Kelas</a>
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
                                <form action="{{ route('kelas.update', $kelas->slug) }}" method="post" class="needs-validation" novalidate>
                                    @csrf
                                    @method('put')
                                    <div class="form-group row mb-4">
                                        <label for="nama_kelas" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Kelas</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas" name="nama_kelas" value="{{ $kelas->nama }}" required autofocus>
                                            @error('nama_kelas')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="guru" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Wali Kelas</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control choices" id="guru" name="guru" required>
                                                @foreach ($guru as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id === $kelas->id_guru ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="program" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Program Keahlian</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control choices" id="program" name="program" required>
                                                @foreach ($program as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id === $kelas->id_program ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="angkatan" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun Angkatan</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control choices" id="angkatan" name="angkatan" required>
                                                @foreach ($angkatan as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id === $kelas->id_angkatan ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
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
@endsection