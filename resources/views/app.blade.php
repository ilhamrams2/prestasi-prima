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
<body class="antialiased @hasSection('hideSidebar') no-sidebar @endif overflow-x-hidden" x-data="{ sidebarCollapsed: false }">
    <div class="min-h-screen bg-gray-50 flex">
        
        {{-- Sidebar dinamis berdasarkan role; can be hidden per-page by defining a `hideSidebar` section --}}
        @unless(View::hasSection('hideSidebar'))
            @auth
                @if(Auth::user()->role === 'admin')
                    @include('AdminSidebar')
                @else
                    @include('SidebarLance')
                @endif
            @else
                {{-- Kalau belum login, sidebar default user --}}
                @include('SidebarLance')
            @endauth
        @endunless

        {{-- Main Content --}}
        @if(View::hasSection('hideSidebar'))
            <div class="flex-1 transition-all duration-300">
                @yield('content')
            </div>
        @elseif(View::hasSection('centerMain'))
            {{-- Page wants to be centered in viewport while sidebar remains visible --}}
            <div class="flex-1 transition-all duration-300">
                {{-- Alpine will measure the actual sidebar width and translate the centered wrapper left by half that width
                     so the content's center aligns with the viewport center while sidebar remains visible. Uses $root.sidebarCollapsed
                     so the offset updates when the sidebar toggles. --}}
                <div x-ref="center" class="center-wrapper transition-all duration-300"
                     x-init="(() => {
                         const compute = () => {
                             // Only apply centering on wide screens
                             if (window.innerWidth < 1024) { $refs.center.style.transform = ''; return; }

                            // compute viewport center
                            const viewportCenter = Math.round(window.innerWidth / 2);
                            // measure the current centered wrapper
                            const rect = $refs.center.getBoundingClientRect();
                            const contentCenter = Math.round(rect.left + rect.width / 2);

                            // delta to move content so its center matches viewport center
                            const rawDelta = Math.round(viewportCenter - contentCenter);
                            // small visual correction (leave 0 by default). Positive moves content right.
                            const correction = 0;
                            const delta = rawDelta + correction;

                            // Apply transform using translate3d for better rendering
                            $refs.center.style.transform = delta ? `translate3d(${delta}px, 0, 0)` : '';
                        };

                        const scheduleCompute = () => {
                            compute();
                            setTimeout(compute, 80);
                            setTimeout(compute, 300);
                        };

                        scheduleCompute();
                        window.addEventListener('resize', scheduleCompute);
                        window.addEventListener('sidebar-toggled', scheduleCompute);
                        // also listen for a small delay after DOMContentLoaded
                        document.addEventListener('DOMContentLoaded', scheduleCompute);
                    })()">
                    @yield('content')
                </div>
            </div>
        @else
            <div :class="sidebarCollapsed ? 'lg:ml-20' : 'lg:ml-80'" class="flex-1 transition-all duration-300">
                @yield('content')
            </div>
        @endif
    </div>

    @stack('scripts')
</body>
</html>

