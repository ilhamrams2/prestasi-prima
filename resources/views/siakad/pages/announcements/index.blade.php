@extends('siakad.index')

@section('title', 'Pengumuman')

@section('content')
<div class="p-6 space-y-8">

    {{-- ================= HEADER ================= --}}
    <div class="pb-5 border-b bg-gradient-to-r from-orange-50 to-white rounded-xl px-4 py-3 shadow-sm mb-6">
        <nav class="flex items-center text-sm text-gray-500 mb-3 space-x-2">
            <a href="{{ route('siakad.dashboard') }}" class="hover:text-orange-600 transition-colors flex items-center gap-1">
                <i class="ri-home-4-line text-lg"></i> Dashboard
            </a>
            <span>/</span>
            <span class="text-gray-700 font-semibold flex items-center gap-1">
                <i class="ri-megaphone-line text-lg text-orange-500"></i> Pengumuman
            </span>
        </nav>

        <div class="flex items-center gap-3">
            <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
                <i class="ri-megaphone-fill text-3xl"></i>
            </div>
            <div>
                <h1 class="text-3xl font-extrabold text-orange-600">Pengumuman Sekolah</h1>
                <p class="text-gray-600 text-sm mt-1">
                    Baca informasi terbaru, penting, dan acara dari sekolah
                </p>
            </div>
        </div>
    </div>

    <!-- Search -->
    <div class="relative max-w-lg">
        <input type="text" placeholder="Cari pengumuman..."
               class="w-full rounded-xl border-gray-300 shadow-sm pl-10 pr-4 py-2
                      focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
        <i class="ri-search-line absolute left-3 top-2.5 text-gray-400"></i>
    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="flex items-center gap-4 bg-orange-50 rounded-xl p-5 shadow">
            <div class="p-3 bg-orange-100 rounded-full">
                <i class="ri-file-list-3-line text-orange-600 text-2xl"></i>
            </div>
            <div>
                <div class="text-2xl font-bold text-orange-600">5</div>
                <p class="text-sm text-gray-600">Total Pengumuman</p>
            </div>
        </div>
        <div class="flex items-center gap-4 bg-red-50 rounded-xl p-5 shadow">
            <div class="p-3 bg-red-100 rounded-full">
                <i class="ri-alert-line text-red-600 text-2xl"></i>
            </div>
            <div>
                <div class="text-2xl font-bold text-red-600">2</div>
                <p class="text-sm text-gray-600">Prioritas Tinggi</p>
            </div>
        </div>
        <div class="flex items-center gap-4 bg-indigo-50 rounded-xl p-5 shadow">
            <div class="p-3 bg-indigo-100 rounded-full">
                <i class="ri-book-open-line text-indigo-600 text-2xl"></i>
            </div>
            <div>
                <div class="text-2xl font-bold text-indigo-600">5</div>
                <p class="text-sm text-gray-600">Akademik</p>
            </div>
        </div>
        <div class="flex items-center gap-4 bg-yellow-50 rounded-xl p-5 shadow">
            <div class="p-3 bg-yellow-100 rounded-full">
                <i class="ri-calendar-event-line text-yellow-600 text-2xl"></i>
            </div>
            <div>
                <div class="text-2xl font-bold text-yellow-600">5</div>
                <p class="text-sm text-gray-600">Acara</p>
            </div>
        </div>
    </div>

    <!-- Daftar Pengumuman -->
    <div class="space-y-6">

        <!-- Card: Libur Semester -->
        <div class="bg-white rounded-xl border-l-4 border-red-500 shadow p-6 hover:shadow-md transition">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="font-semibold text-lg text-gray-800 flex items-center gap-2">
                        <i class="ri-notification-3-line text-red-500"></i>
                        Libur Semester Ganjil 2024
                    </h2>
                    <p class="text-sm text-gray-500">oleh Admin Sekolah · 2024-01-10</p>
                </div>
                <span class="bg-red-100 text-red-600 text-xs px-3 py-1 rounded-full">Penting</span>
            </div>
            <p class="mt-3 text-gray-600 leading-relaxed">
                Libur semester ganjil akan dimulai 15 Desember 2024 dan berakhir 8 Januari 2025.
                Seluruh siswa diharapkan menggunakan waktu libur dengan baik.
            </p>
            <div class="mt-4 flex flex-wrap gap-2">
                <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">Target: Semua</span>
                <span class="bg-red-100 text-red-600 text-xs px-3 py-1 rounded-full">Prioritas: Tinggi</span>
            </div>
        </div>

        <!-- Card: UKK -->
        <div class="bg-white rounded-xl border-l-4 border-orange-500 shadow p-6 hover:shadow-md transition">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="font-semibold text-lg text-gray-800 flex items-center gap-2">
                        <i class="ri-star-line text-orange-500"></i>
                        Pendaftaran UKK (Ujian Kompetensi Keahlian) 2024
                    </h2>
                    <p class="text-sm text-gray-500">oleh Panitia UKK · 2024-01-08</p>
                </div>
                <span class="bg-red-100 text-red-600 text-xs px-3 py-1 rounded-full">Penting</span>
            </div>
            <p class="mt-3 text-gray-600 leading-relaxed">
                Pendaftaran UKK untuk kelas XII dimulai tanggal 20 Januari 2024.
                Silakan hubungi wali kelas untuk informasi lebih lanjut.
            </p>
            <div class="mt-4 flex flex-wrap gap-2">
                <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">Target: XII RPL</span>
                <span class="bg-red-100 text-red-600 text-xs px-3 py-1 rounded-full">Prioritas: Tinggi</span>
            </div>
        </div>

        <!-- Card: Workshop -->
        <div class="bg-white rounded-xl border-l-4 border-yellow-500 shadow p-6 hover:shadow-md transition">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="font-semibold text-lg text-gray-800 flex items-center gap-2">
                        <i class="ri-calendar-todo-line text-yellow-500"></i>
                        Workshop Web Development
                    </h2>
                    <p class="text-sm text-gray-500">oleh Guru RPL · 2024-01-05</p>
                </div>
                <span class="bg-yellow-100 text-yellow-600 text-xs px-3 py-1 rounded-full">Acara</span>
            </div>
            <p class="mt-3 text-gray-600 leading-relaxed">
                Workshop pengembangan web akan diadakan setiap Sabtu dimulai tanggal 25 Januari 2024
                di Lab Komputer. Gratis untuk seluruh siswa RPL.
            </p>
            <div class="mt-4 flex flex-wrap gap-2">
                <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">Target: RPL</span>
                <span class="bg-orange-100 text-orange-600 text-xs px-3 py-1 rounded-full">Prioritas: Sedang</span>
            </div>
        </div>

        <!-- Card: Jadwal -->
        <div class="bg-white rounded-xl border-l-4 border-indigo-500 shadow p-6 hover:shadow-md transition">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="font-semibold text-lg text-gray-800 flex items-center gap-2">
                        <i class="ri-calendar-schedule-line text-indigo-500"></i>
                        Perubahan Jadwal Pelajaran
                    </h2>
                    <p class="text-sm text-gray-500">oleh Wali Kelas X RPL 1 · 2023-12-28</p>
                </div>
                <span class="bg-indigo-100 text-indigo-600 text-xs px-3 py-1 rounded-full">Jadwal</span>
            </div>
            <p class="mt-3 text-gray-600 leading-relaxed">
                Jadwal pelajaran baru akan berlaku mulai minggu depan.
                Harap diperhatikan oleh seluruh siswa agar tidak salah masuk kelas.
            </p>
            <div class="mt-4 flex flex-wrap gap-2">
                <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">Target: Semua</span>
            </div>
        </div>

    </div>
</div>
@endsection
