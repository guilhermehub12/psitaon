<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }} | Login</title>
        <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/images/favicon.ico') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <img
                    src="{{ Vite::asset('resources/images/preloader.png') }}"
                    alt="Lila Baking Studio Logo"
                    class="brand-image img-circle elevation-3"
                >
            </div>
            <div class="card">
                <div class="card-header text-center font-weight-bold text-white" style="font-size: 28px;">
                    Lila Baking Studio
                </div>
                <div class="card-body login-card-body">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
