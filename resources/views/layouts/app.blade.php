<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendataan Administrasi Prakerin</title>
    
    @include('layouts.part.links')
</head>
<body>
    <div id="app">
        @include('sweetalert::alert')
        @include('layouts.sidebar')

        <div id="main" class='layout-navbar navbar-fixed'>
            @include('layouts.navbar')

            <div id="main-content">
                @yield('content')
            </div>

            @include('layouts.footer')
        </div>

        @include('dashboard.angkatan.components.create')
    </div>

    @include('layouts.part.scripts')
</body>