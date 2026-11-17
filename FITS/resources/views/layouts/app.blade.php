<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="@yield('theme-color', '#003670')">
    <meta name="description" content="@yield('description', 'FITS — Find Items in ITS')">
    <title>@yield('title', 'FITS — Find Items in ITS')</title>

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    @stack('styles')
</head>
<body class="@yield('body-class')">
    @yield('content')

    @stack('scripts')
</body>
</html>
