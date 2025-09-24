@extends('siakad.index')

@section('title', 'Jurusan - SIAKAD Sekolah')

@section('content')
<div class="space-y-10">

    {{-- Hero Section --}}
    <div class="bg-gradient-to-r from-orange-500 to-yellow-400 rounded-2xl shadow-lg p-8 text-white relative overflow-hidden">
        <div class="relative z-10">
            <h1 class="text-2xl md:text-3xl font-bold">Jurusan Sekolah</h1>
            <p class="mt-2 text-sm md:text-base text-orange-100">
                Temukan berbagai jurusan yang tersedia di sekolah kami, dirancang untuk membentuk masa depan yang unggul dan berdaya saing.
            </p>
        </div>
        <div class="absolute right-6 bottom-0 opacity-20 text-white text-8xl font-extrabold select-none">
            SIAKAD
        </div>
    </div>

    {{-- Grid Jurusan --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        {{-- PPLG --}}
        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300 group">
            <div class="flex items-center justify-between">
                <div class="bg-orange-100 p-3 rounded-lg group-hover:bg-orange-200 transition">
                    <i data-lucide="code" class="w-6 h-6 text-orange-600"></i>
                </div>
                <span class="text-xs font-medium px-2 py-1 bg-orange-50 text-orange-600 rounded-full">Teknologi</span>
            </div>
            <h3 class="mt-4 text-lg font-semibold text-gray-800">Pengembangan Perangkat Lunak & Gim (PPLG)</h3>
            <p class="mt-2 text-sm text-gray-600">
                Fokus pada pemrograman, desain aplikasi, dan pengembangan game modern untuk menghadapi dunia digital.
            </p>
        </div>

        {{-- TKJ --}}
        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300 group">
            <div class="flex items-center justify-between">
                <div class="bg-blue-100 p-3 rounded-lg group-hover:bg-blue-200 transition">
                    <i data-lucide="server" class="w-6 h-6 text-blue-600"></i>
                </div>
                <span class="text-xs font-medium px-2 py-1 bg-blue-50 text-blue-600 rounded-full">Jaringan</span>
            </div>
            <h3 class="mt-4 text-lg font-semibold text-gray-800">Teknik Komputer & Jaringan (TKJ)</h3>
            <p class="mt-2 text-sm text-gray-600">
                Pembelajaran tentang sistem jaringan komputer, administrasi server, hingga keamanan siber.
            </p>
        </div>

        {{-- DKV --}}
        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300 group">
            <div class="flex items-center justify-between">
                <div class="bg-purple-100 p-3 rounded-lg group-hover:bg-purple-200 transition">
                    <i data-lucide="palette" class="w-6 h-6 text-purple-600"></i>
                </div>
                <span class="text-xs font-medium px-2 py-1 bg-purple-50 text-purple-600 rounded-full">Kreatif</span>
            </div>
            <h3 class="mt-4 text-lg font-semibold text-gray-800">Desain Komunikasi Visual (DKV)</h3>
            <p class="mt-2 text-sm text-gray-600">
                Belajar desain grafis, animasi, ilustrasi, dan komunikasi visual modern untuk industri kreatif.
            </p>
        </div>

        {{-- Akuntansi --}}
        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300 group">
            <div class="flex items-center justify-between">
                <div class="bg-green-100 p-3 rounded-lg group-hover:bg-green-200 transition">
                    <i data-lucide="calculator" class="w-6 h-6 text-green-600"></i>
                </div>
                <span class="text-xs font-medium px-2 py-1 bg-green-50 text-green-600 rounded-full">Bisnis</span>
            </div>
            <h3 class="mt-4 text-lg font-semibold text-gray-800">Akuntansi & Keuangan Lembaga (AKL)</h3>
            <p class="mt-2 text-sm text-gray-600">
                Membekali siswa dengan kemampuan akuntansi, manajemen keuangan, dan bisnis modern.
            </p>
        </div>

        {{-- Perhotelan --}}
        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300 group">
            <div class="flex items-center justify-between">
                <div class="bg-yellow-100 p-3 rounded-lg group-hover:bg-yellow-200 transition">
                    <i data-lucide="concierge-bell" class="w-6 h-6 text-yellow-600"></i>
                </div>
                <span class="text-xs font-medium px-2 py-1 bg-yellow-50 text-yellow-600 rounded-full">Hospitality</span>
            </div>
            <h3 class="mt-4 text-lg font-semibold text-gray-800">Perhotelan</h3>
            <p class="mt-2 text-sm text-gray-600">
                Jurusan untuk mencetak tenaga kerja profesional di bidang layanan perhotelan dan pariwisata.
            </p>
        </div>

        {{-- Tata Boga --}}
        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300 group">
            <div class="flex items-center justify-between">
                <div class="bg-red-100 p-3 rounded-lg group-hover:bg-red-200 transition">
                    <i data-lucide="chef-hat" class="w-6 h-6 text-red-600"></i>
                </div>
                <span class="text-xs font-medium px-2 py-1 bg-red-50 text-red-600 rounded-full">Kuliner</span>
            </div>
            <h3 class="mt-4 text-lg font-semibold text-gray-800">Tata Boga</h3>
            <p class="mt-2 text-sm text-gray-600">
                Menyiapkan siswa untuk menjadi profesional di bidang kuliner, pastry, dan tata hidang.
            </p>
        </div>
    </div>
</div>
@endsection
