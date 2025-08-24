<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description', 'Laravel Application - Modern web application built with Laravel')">
    <meta name="keywords" content="@yield('keywords', 'laravel, web application, php')">
    <meta name="author" content="@yield('author', 'Laravel Team')">
    
    <title>@yield('title', config('app.name', 'Laravel App'))</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="min-h-screen flex flex-col bg-gray-50">
    <!-- Header -->
    @include('layouts.partials.header')
    
    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('layouts.partials.footer')
    
    <!-- Scripts -->
    @stack('scripts')
</body>

</html>