<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @include('layouts.extras.css')
    <style>
        .async-hide {
            opacity: 0 !important
        }

    </style>
</head>

<body>
    @include('flash::message')
    <div id="app" class="bg-custom">
        @include('layouts.navs.sidebar')
        <main class="main-content">
            @include('layouts.navs.top-nav')

            @yield('content')
        </main>
    </div>
    @include('layouts.extras.js')
    @yield('javascript')
    <script>
        $('div.alert').not('.alert-important').delay(4000).fadeOut(350);
    </script>

</body>

</html>
