@extends('layouts.app')

@section('content')
    <a type="button" class="submenu-link" data-bs-toggle="modal" data-bs-target="#tambahKelas">Tambah Kelas</a>
    <a type="button" class="submenu-link" data-bs-toggle="modal" data-bs-target="#tambahProgram">Tambah Program Kehlian</a>
    <a type="button" class="submenu-link" data-bs-toggle="modal" data-bs-target="#tambahAngkatan">Tambah Angkatan</a>

    @include('dashboard.data.angkatan.create')
    @include('dashboard.data.program.create')
    @include('dashboard.data.kelas.create')
@endsection
