<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Admin Prestasi Prima</title>

    {{-- FONT & ICON --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- VITE --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex">

    {{-- ================= SIDEBAR ================= --}}
    <aside class="w-64 bg-white shadow-md flex flex-col fixed inset-y-0 left-0 z-20 border-r border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <h1 class="text-2xl font-bold text-gray-800">Admin <span class="font-light">PP</span></h1>
        </div>

        <nav class="flex-1 overflow-y-auto px-4 py-6 space-y-1">
            @php
                $currentRoute = Route::currentRouteName();
            @endphp

            {{-- Dashboard --}}
      <a href="{{ route('prestasiprima.admin.dashboard') }}"
         class="flex items-center gap-3 px-4 py-2 rounded-lg transition
         {{ $currentRoute === 'prestasiprima.admin.dashboard' ? 'bg-gray-100 text-gray-900 font-semibold' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }}">
    <i class="ri-home-4-line text-lg"></i>
        <span>Dashboard</span>
      </a>

            {{-- Manajemen Berita --}}
            <a href="{{ route('prestasiprima.admin.berita.index') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg transition
         {{ str_contains($currentRoute, 'berita') ? 'bg-gray-100 text-gray-900 font-semibold' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }}">
                <i class="ri-newspaper-line text-lg"></i>
                <span>Manajemen Berita</span>
            </a>

            {{-- Manajemen Galeri --}}
            <a href="{{ route('prestasiprima.admin.gallery.index') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg transition
         {{ str_contains($currentRoute, 'gallery') ? 'bg-gray-100 text-gray-900 font-semibold' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }}">
                <i class="ri-image-line text-lg"></i>
                <span>Manajemen Galeri</span>
            </a>

            {{-- Manajemen Prestasi --}}
            <a href="{{ route('prestasiprima.admin.prestasi.index') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg transition
        {{ $currentRoute === 'prestasiprima.admin.prestasi.index' ? 'bg-gray-100 text-gray-900 font-semibold' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }}">
                <i class="ri-trophy-line text-lg"></i>
                <span>Manajemen Prestasi</span>
            </a>

            {{-- Manajemen Kegiatan --}}
            <a href="{{ route('prestasiprima.admin.kegiatan.index') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg transition
         {{ str_contains($currentRoute, 'kegiatan') ? 'bg-gray-100 text-gray-900 font-semibold' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }}">
                <i class="ri-calendar-event-line text-lg"></i>
                <span>Manajemen Kegiatan</span>
            </a>

            {{-- Manajemen Staff --}}
            <a href="{{ route('prestasiprima.admin.staff.index') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg transition
         {{ str_contains($currentRoute, 'staff') ? 'bg-gray-100 text-gray-900 font-semibold' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }}">
                <i class="ri-user-settings-line text-lg"></i>
                <span>Manajemen Staff</span>
            </a>

            {{-- Manajemen Karya & Proyek --}}
            <a href="#"
                class="flex items-center gap-3 px-4 py-2 rounded-lg transition
         {{ str_contains($currentRoute, 'karya') ? 'bg-gray-100 text-gray-900 font-semibold' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }}">
                <i class="ri-lightbulb-line text-lg"></i>
                <span>Manajemen Karya & Proyek</span>
            </a>

            {{-- Manajemen Ekstrakurikuler --}}
            <a href="#"
                class="flex items-center gap-3 px-4 py-2 rounded-lg transition
         {{ str_contains($currentRoute, 'ekstra') ? 'bg-gray-100 text-gray-900 font-semibold' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }}">
                <i class="ri-team-line text-lg"></i>
                <span>Manajemen Ekstrakurikuler</span>
            </a>

            {{-- Manajemen Industri --}}
            <a href="{{ route('prestasiprima.admin.industri.index') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg transition
         {{ str_contains($currentRoute, 'industri') ? 'bg-gray-100 text-gray-900 font-semibold' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }}">
                <i class="ri-building-4-line text-lg"></i>
                <span>Manajemen Industri</span>
            </a>

            {{-- Manajemen Testimoni --}}
            <a href="#"
                class="flex items-center gap-3 px-4 py-2 rounded-lg transition
         {{ str_contains($currentRoute, 'testimoni') ? 'bg-gray-100 text-gray-900 font-semibold' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }}">
                <i class="ri-chat-3-line text-lg"></i>
                <span>Manajemen Testimoni</span>
            </a>

            <hr class="my-3 border-gray-200">

            <a href="/" target="_blank"
                class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition">
                <i class="ri-earth-line text-lg"></i>
                <span>Lihat Website</span>
            </a>
        </nav>

        <div class="p-4 border-t border-gray-200">
        <form action="{{ route('authPP.logout') }}" method="POST">
            @csrf
            <button type="submit"
            class="w-full flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-lg shadow-md transition">
            <i class="ri-logout-box-line text-lg"></i>
            Logout
            </button>
        </form>
        </div>
    </aside>

    {{-- ================= MAIN CONTENT ================= --}}
    <main class="flex-1 ml-64">
        {{-- HEADER --}}
        <header class="bg-white shadow-sm sticky top-0 z-10 border-b border-gray-200">
            <div class="flex items-center justify-between px-6 py-4">
                <h2 class="text-xl font-semibold text-gray-800">@yield('title')</h2>
                <div class="flex items-center gap-3 text-gray-600">
                    <i class="ri-user-3-line text-2xl text-gray-700"></i>
                    <span>Admin</span>
                </div>
            </div>
        </header>

        {{-- PAGE CONTENT --}}
        <section class="p-6">
            @yield('content')
        </section>
    </main>
</body>

</html>
