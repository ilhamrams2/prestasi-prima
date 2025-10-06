<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Job Portal') }} - @yield('title', 'Cari Lowongan Kerja')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @stack('styles')
</head>
<body class="antialiased" x-data="{ sidebarCollapsed: false }">
    <div class="min-h-screen bg-gray-50 flex">
        {{-- Include Sidebar --}}
        @include('SidebarLance')

        {{-- Main Content Area --}}
        <div :class="sidebarCollapsed ? 'lg:ml-20' : 'lg:ml-80'" 
             class="flex-1 transition-all duration-300">
            
            @yield('content')
            
        </div>
    </div>

    @stack('scripts')
</body>
</html>
