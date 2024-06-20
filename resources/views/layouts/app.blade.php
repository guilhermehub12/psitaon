<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            @includeIf("layouts.shared.app.preloader")
            @includeIf("layouts.shared.app.header")
            @includeIf("layouts.shared.app.menu")
            <div class="content-wrapper">
                <div class="content">
                    <div class="container-fluid">
                        {{ Auth::user() }}
                    </div>
                </div>
            </div>
            @includeIf("layouts.shared.app.footer")
        </div>
    </body>
</html>
