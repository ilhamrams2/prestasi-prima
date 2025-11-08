<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Job Portal') }} - @yield('title', 'Cari Lowongan Kerja')</title>

     {{-- === Favicon === --}}
  <link rel="icon" type="image/png" href="{{ asset('assets/images/logo-smk.png') }}">
  <link rel="apple-touch-icon" href="{{ asset('assets/images/logo-smk.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
                         // Robust centering: compute delta between viewport center and content center,
                         // but avoid applying tiny repeated transforms. Also disable transition for
                         // the very first apply so the page doesn't visibly jump twice.
                         let lastDelta = null;
                         let firstApplied = false;

                         const applyDelta = (delta, { instant = false } = {}) => {
                             // Only apply if change is noticeable (>=2px) or not applied yet
                             if (lastDelta !== null && Math.abs(delta - lastDelta) <= 2) return;

                             if (instant) {
                                 // Temporarily disable transition for a single frame
                                 const prev = $refs.center.style.transition;
                                 $refs.center.style.transition = 'none';
                                 $refs.center.style.transform = delta ? `translate3d(${delta}px, 0, 0)` : '';
                                 // Force layout and then restore transition
                                 requestAnimationFrame(() => {
                                     $refs.center.style.transition = prev || '';
                                 });
                             } else {
                                 $refs.center.style.transform = delta ? `translate3d(${delta}px, 0, 0)` : '';
                             }

                             lastDelta = delta;
                         };

                         const compute = () => {
                             if (!$refs.center) return;
                             // Only apply centering on wide screens
                             if (window.innerWidth < 1024) { applyDelta(0); return; }

                             const viewportCenter = Math.round(window.innerWidth / 2);
                             const rect = $refs.center.getBoundingClientRect();
                             const currentDelta = lastDelta ?? 0;
                             // rect already reflects current transform; subtract previously applied delta
                             const contentCenter = Math.round(rect.left + rect.width / 2 - currentDelta);
                             const rawDelta = Math.round(viewportCenter - contentCenter);
                             const correction = 0;
                             const delta = rawDelta + correction;

                             // For the very first compute, apply instantly (no transition) to avoid a visible double-move.
                             if (!firstApplied) {
                                 applyDelta(delta, { instant: true });
                                 firstApplied = true;
                             } else {
                                 applyDelta(delta, { instant: false });
                             }
                         };

                         const scheduleCompute = () => {
                             compute();
                             // run again shortly after in case images/fonts changed layout
                             setTimeout(compute, 120);
                             setTimeout(compute, 400);
                         };

                         // initial
                         scheduleCompute();
                         // final once the page fully loads
                         window.addEventListener('load', scheduleCompute);
                         window.addEventListener('resize', scheduleCompute);
                         window.addEventListener('sidebar-toggled', scheduleCompute);
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

