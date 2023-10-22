@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail Perusahaan</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('perusahaan.index') }}">Data Perusahaan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Peusahaan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="card-title">
                                Data Perusahaan
                            </h5>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editPerusahaan{{ $item->id }}">
                                <i class="bi bi-pencil-square"></i>
                                Edit Perusahaan
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        Nama Perusahaan :<br>
                        <b>{{ strtoupper($item->nama) }}</b>
                    </p>
                    <hr>
                    <p class="card-text">
                        <b>Alamat Perusahaan : </b><br>
                        {{ $item->alamat }}, {{ $item->kecamatan }}, {{ $item->kota }}, {{ $item->provinsi }}
                    </p>
                    <p class="card-text">
                        <b>Penerima Surat :</b><br>
                        {{ $item->penerima }}
                    </p>
                    <p class="card-text">
                        <b>Nomor Telepon Perusahaan</b><br>
                        {{ $item->telepon }}
                    </p>
                    <p class="card-text">MAPS</p>
                    {!! $item->koordinat !!}
                </div>
            </div>
        </section>
    </div>
    @include('dashboard.perusahaan.edit')
@endsection