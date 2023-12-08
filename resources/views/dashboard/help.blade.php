@extends('layouts.app')

@section('link')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Panduan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Panduan</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Panduan penggunaan aplikasi</h2>
                <p class="section-lead">
                    Berikut panduan penggunaan aplikasi Monitor Prakerin ini.
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="activities">
                            <div class="activity">
                                <div class="activity-icon bg-primary text-white shadow-primary">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="activity-detail">
                                    <div class="mb-2">
                                        <span class="text-job">Masuk ke akun</span>
                                        <span class="bullet"></span>
                                        <a class="text-job" href="#">Buka</a>
                                    </div>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim, reprehenderit!</p>
                                </div>
                            </div>
                            <div class="activity">
                                <div class="activity-icon bg-primary text-white shadow-primary">
                                    <i class="fas fa-user-cog"></i>
                                </div>
                                <div class="activity-detail">
                                    <div class="mb-2">
                                        <span class="text-job">Kelola User</span>
                                        <span class="bullet"></span>
                                        <a class="text-job" href="{{ route('user.index') }}">Buka</a>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit veniam cumque
                                        explicabo autem, unde incidunt accusantium saepe adipisci voluptate amet!</p>
                                </div>
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
