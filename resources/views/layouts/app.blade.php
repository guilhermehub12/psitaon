<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/images/favicon.ico') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            @includeIf("layouts.shared.app.preloader")
            @includeIf("layouts.shared.app.header")
            @includeIf("layouts.shared.app.menu")
            <div class="content-wrapper">
                {{ $breadcrumb ?? '' }}
                <section class="content">
                    <div class="container-fluid">
                        @if (session('success'))
                            <x-admin.alert type="success" :message="session('success')" icon="fas fa-check-circle" />
                        @elseif (session('danger'))
                            <x-admin.alert type="danger" :message="session('danger')" icon="fas fa-exclamation-circle" />
                        @elseif (session('info'))
                            <x-admin.alert type="info" :message="session('info')" icon="fas fa-info-circle" />
                        @endif
                        {{ $slot }}
                    </div>
                </section>
            </div>
            @includeIf("layouts.shared.app.footer")
        </div>
        @stack('scripts')
        @stack('modals')
    </body>
</html>
