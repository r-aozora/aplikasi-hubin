<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendataan Administrasi Prakerin</title>
    
    <link rel="shortcut icon" href="{{ asset('assets/img/logo_sekolah.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo_sekolah.png"') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/auth.css') }}">
</head>
<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    @include('sweetalert::alert')
    @yield('content')
</body>
</html>