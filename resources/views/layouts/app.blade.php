<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendataan Administrasi Prakerin</title>
    
    <link rel="shortcut icon" href="./assets/img/logo_sekolah.png" type="image/x-icon">
    <link rel="shortcut icon" href="./assets/img/logo_sekolah.png" type="image/png">
    <link rel="stylesheet" href="./assets/compiled/css/app.css">
    <link rel="stylesheet" href="./assets/compiled/css/app-dark.css">
</head>
<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="app">
        @include('layouts.sidebar')

        <div id="main" class='layout-navbar navbar-fixed'>
            @include('layouts.navbar')

            <div id="main-content">
                @yield('content')
            </div>

            @include('layouts.footer')
        </div>
    </div>

    <script src="assets/static/js/components/dark.js"></script>
    <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/compiled/js/app.js"></script>
</body>