@extends('layouts.guest')

@section('content')
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-1">
                <div id="auth-right"></div>
            </div>
            <div class="col-lg-4 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('images/logo_sekolah.png') }}" alt="Logo Sekolah">
                        </a>
                    </div>
                    <h3 class="auth-title">Sistem Pendataan Administrasi Prakerin</h3>
                    <form action="{{ url('/login') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="username" value="{{ Session::get('username') }}" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>
@endsection