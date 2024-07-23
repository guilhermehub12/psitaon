<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/images/favicon.ico') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="hold-transition layout-fixed layout-navbar-fixed layout-footer-fixed" style="background-color: #f8f8fa;">
        <div class="wrapper">
            @includeIf("layouts.shared.app.preloader")
            @includeIf("layouts.shared.app.header")
            {{-- @includeIf("layouts.shared.app.menu") --}}
            <div class="wrapper" style="padding-top: 5em; padding-bottom: 5em;">
                {{ $breadcrumb ?? '' }}
                <section class="content">
                    <div class="container">
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
        <script src="{{ asset('adminlte-3.2.0/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('adminlte-3.2.0/plugins/chart.js/Chart.min.js') }}"></script>
        @stack('modals')
        @stack('scripts')
    </body>
</html>
