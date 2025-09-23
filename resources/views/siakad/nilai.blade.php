@extends('siakad.layouts.siakad')

@section('title', 'Nilai & Rapor')

@section('content')
<div class="p-6">
    <!-- Header -->
    <h2 class="text-2xl font-bold mb-2">Nilai & Rapor</h2>
    <p class="text-gray-600 mb-6">Lihat nilai dan download rapor Anda</p>

    <!-- Statistik ringkas -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-orange-100 rounded-xl p-4 flex items-center gap-3">
            <div class="bg-orange-500 text-white rounded-full w-10 h-10 flex items-center justify-center">
                <i class="fas fa-star"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Rata-rata Nilai</p>
                <p class="text-lg font-semibold">89.5</p>
            </div>
        </div>

        <div class="bg-blue-100 rounded-xl p-4 flex items-center gap-3">
            <div class="bg-blue-500 text-white rounded-full w-10 h-10 flex items-center justify-center">
                <i class="fas fa-book"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Mata Pelajaran</p>
                <p class="text-lg font-semibold">13</p>
            </div>
        </div>

        <div class="bg-yellow-100 rounded-xl p-4 flex items-center gap-3">
            <div class="bg-yellow-500 text-white rounded-full w-10 h-10 flex items-center justify-center">
                <i class="fas fa-award"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Ketuntasan</p>
                <p class="text-lg font-semibold">85%</p>
            </div>
        </div>

        <div class="bg-pink-100 rounded-xl p-4 flex items-center gap-3">
            <div class="bg-pink-500 text-white rounded-full w-10 h-10 flex items-center justify-center">
                <i class="fas fa-chart-line"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Peningkatan</p>
                <p class="text-lg font-semibold">+5.2</p>
            </div>
        </div>
    </div>

    <!-- Tabs -->
    <div class="mb-6 border-b">
        <ul class="flex space-x-6 text-gray-600">
            <li class="pb-2 border-b-2 border-orange-500 text-orange-500 font-medium">Nilai</li>
            <li class="pb-2 hover:text-orange-500 cursor-pointer">Transkrip</li>
            <li class="pb-2 hover:text-orange-500 cursor-pointer">Rapor</li>
        </ul>
    </div>

    <!-- Daftar Nilai -->
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Daftar Nilai Semester Ganjil<br>
            <span class="text-gray-500 text-sm">Tahun Ajaran 2023/2024</span>
        </h3>

        <div class="divide-y">
            <!-- Matematika -->
            <div class="flex justify-between items-center py-4">
                <div>
                    <p class="font-medium">Matematika</p>
                    <p class="text-sm text-gray-500">Semester Ganjil</p>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-lg font-bold">89</span>
                    <span class="text-green-600 text-sm font-semibold">A-</span>
                </div>
            </div>

            <!-- Bahasa Indonesia -->
            <div class="flex justify-between items-center py-4">
                <div>
                    <p class="font-medium">Bahasa Indonesia</p>
                    <p class="text-sm text-gray-500">Semester Ganjil</p>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-lg font-bold">78</span>
                    <span class="text-blue-600 text-sm font-semibold">B-</span>
                </div>
            </div>

            <!-- Fisika -->
            <div class="flex justify-between items-center py-4">
                <div>
                    <p class="font-medium">Fisika</p>
                    <p class="text-sm text-gray-500">Semester Ganjil</p>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-lg font-bold">95</span>
                    <span class="text-green-600 text-sm font-semibold">A</span>
                </div>
            </div>

            <!-- Algoritma & Pemrograman -->
            <div class="flex justify-between items-center py-4">
                <div>
                    <p class="font-medium">Algoritma & Pemrograman</p>
                    <p class="text-sm text-gray-500">Semester Ganjil</p>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-lg font-bold">92</span>
                    <span class="text-green-600 text-sm font-semibold">A+</span>
                </div>
            </div>

            <!-- Bahasa Jepang -->
            <div class="flex justify-between items-center py-4">
                <div>
                    <p class="font-medium">Bahasa Jepang</p>
                    <p class="text-sm text-gray-500">Semester Ganjil</p>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-lg font-bold">81</span>
                    <span class="text-green-600 text-sm font-semibold">A-</span>
                </div>
            </div>

            <!-- Bahasa Inggris -->
            <div class="flex justify-between items-center py-4">
                <div>
                    <p class="font-medium">Bahasa Inggris</p>
                    <p class="text-sm text-gray-500">Semester Ganjil</p>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-lg font-bold">100</span>
                    <span class="text-green-600 text-sm font-semibold">A+</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
