@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Dashboard</h3>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Profil Sekolah</h5>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Identitas Sekolah</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Kontak</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row mx-3">
                                        <div class="col-md-3 col-12">
                                            <img class="card-img-top img-fluid mt-10" src="{{ url('assets/img/logo_sekolah.png') }}" alt="Logo Sekolah"/>
                                        </div>
                                        <div class="col-md-9 col-12">
                                            <div class="card-body">
                                                <div class="card-text">
                                                    <div class="row mb-3">
                                                        <div class="col-md-6 label font-bold">NPSN</div>
                                                        <div class="col-md-6">0123456789</div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6 label font-bold">Status</div>
                                                        <div class="col-md-6">Negeri</div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6 label font-bold">Bentuk Pendidikan</div>
                                                        <div class="col-md-6">SMK</div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6 label font-bold">Status Kepemilikan</div>
                                                        <div class="col-md-6">Pemerintah Pusat</div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6 label font-bold">SK Pendirian Sekolah</div>
                                                        <div class="col-md-6">0123/4/5678</div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6 label font-bold">Tanggal SK Pendirian</div>
                                                        <div class="col-md-6">0123-45-67</div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6 label font-bold">SK Izin Operasional</div>
                                                        <div class="col-md-6">0123456789</div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6 label font-bold">Tanggal SK Izin Operasional</div>
                                                        <div class="col-md-6">0123-45-67</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="col-12 mx-3">
                                        <div class="card-body">
                                            <div class="card-text">
                                                <div class="row mb-3">
                                                    <div class="col-md-4 label font-bold">Alamat</div>
                                                    <div class="col-md-8">JL. VETERAN NO.1A TANGERANG</div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-4 label font-bold">RT / RW</div>
                                                    <div class="col-md-8">0 / 0</div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-4 label font-bold">Dusun</div>
                                                    <div class="col-md-8">BABAKAN</div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-4 label font-bold">Desa / Kelurahan</div>
                                                    <div class="col-md-8">Babakan</div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-4 label font-bold">Kecamatan</div>
                                                    <div class="col-md-8">Kec. Tangerang</div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-4 label font-bold">Kota / Kabupaten</div>
                                                    <div class="col-md-8">Kota Tangerang</div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-4 label font-bold">Provinsi</div>
                                                    <div class="col-md-8">Banten</div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-4 label font-bold">Kode Pos</div>
                                                    <div class="col-md-8">15118</div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-4 label font-bold">Lintang</div>
                                                    <div class="col-md-8">-6</div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-4 label font-bold">Bujur</div>
                                                    <div class="col-md-8">106</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection