@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Kelola Data</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ $title }}</h2>
                <p class="section-lead">
                    Organize and adjust all settings about this site.
                </p>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="card-body">
                                <h4>Data Siswa</h4>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id, officia!</p>
                                <a href="#" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top"
                                    title="Download Data Siswa">
                                    <i class="fas fa-download"></i>
                                </a>
                                <button class="btn btn-sm btn-info" id="btn-import" data-toggle="tooltip"
                                    data-placement="top" title="Impor Data Siswa">
                                    <i class="fas fa-upload"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-user-friends"></i>
                            </div>
                            <div class="card-body">
                                <h4>Data Guru</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, explicabo.</p>
                                <a href="#" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top"
                                    title="Download Data Guru">
                                    <i class="fas fa-download"></i>
                                </a>
                                <button class="btn btn-sm btn-info" id="btn-import-guru" data-toggle="tooltip"
                                    data-placement="top" title="Impor Data Guru">
                                    <i class="fas fa-upload"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="card-body">
                                <h4>Data Perusahaan</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, explicabo.</p>
                                <a href="#" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top"
                                    title="Download Data Perusahaan">
                                    <i class="fas fa-download"></i>
                                </a>
                                <button class="btn btn-sm btn-info" id="btn-import-perusahaan" data-toggle="tooltip"
                                    data-placement="top" title="Impor Data Perusahaan">
                                    <i class="fas fa-upload"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-tv"></i>
                            </div>
                            <div class="card-body">
                                <h4>Data Monitoring</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, explicabo.</p>
                                <a href="#" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top"
                                    title="Download Data Monitoring">
                                    <i class="fas fa-download"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Program Keahlian</h4>
                                <div class="card-header-action">
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahProgram">
                                        <i class="fas fa-plus"></i>
                                        Tambah Data
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>NAMA PROGRAM</th>
                                                <th>JUMLAH KELAS</th>
                                                <th>OPTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($program as $item)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->kelas_count }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-warning btn-edit-program" data-modal-id="{{ $item->slug }}" data-toggle="tooltip" data-placement="top" title="Edit Data">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <a href="{{ route('program.destroy', $item->slug) }}" class="btn btn-sm btn-danger" data-confirm-delete="true"  data-toggle="tooltip" data-placement="top" title="Hapus Data">
                                                            <i class="fas fa-trash" onclick="event.preventDefault(); this.closest('a').click();"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Angkatan</h4>
                                <div class="card-header-action">
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahAngkatan">
                                        <i class="fas fa-plus"></i>
                                        Tambah Data
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-2">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>TAHUN ANGKATAN</th>
                                                <th>JUMLAH KELAS</th>
                                                <th>OPTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($angkatan as $item)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->kelas_count }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-warning btn-edit-angkatan" data-modal-id="{{ $item->slug }}" data-toggle="tooltip" data-placement="top" title="Edit Data">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <a href="{{ route('angkatan.destroy', $item->slug) }}" class="btn btn-sm btn-danger" data-confirm-delete="true"  data-toggle="tooltip" data-placement="top" title="Hapus Data">
                                                            <i class="fas fa-trash" onclick="event.preventDefault(); this.closest('a').click();"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('dashboard.guru.import')
    @include('dashboard.perusahaan.import')

    @include('dashboard.data.program.create')
    @include('dashboard.data.angkatan.create')

    @foreach ($program as $item)
        @include('dashboard.data.program.edit')
    @endforeach

    @foreach ($angkatan as $item)
        @include('dashboard.data.angkatan.edit')
    @endforeach
@endsection

@section('script')
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
    <script>
        document.getElementById('btn-import-guru').addEventListener('click', function() {
            $('#importGuru').modal('show');
        });

        document.getElementById('btn-import-perusahaan').addEventListener('click', function() {
            $('#importPerusahaan').modal('show');
        });

        $('.btn-edit-program').click(function() {
            let id = $(this).data('modal-id');
            $('#editProgram' + id).modal('show');
        });

        $('.btn-edit-angkatan').click(function() {
            let id = $(this).data('modal-id');
            $('#editAngkatan' + id).modal('show');
        });
    </script>
@endsection