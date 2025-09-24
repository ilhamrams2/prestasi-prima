@extends('siakad.index')

@section('content')
<div class="container mx-auto p-4 sm:p-6 space-y-8">

  {{-- Banner Sambutan --}}
  <div class="bg-gradient-to-r from-orange-500 to-yellow-400 rounded-xl shadow-md p-6 text-white">
    <h2 class="text-lg sm:text-xl font-bold">Selamat Datang, Ahmad Rizki!</h2>
    <p class="text-xs sm:text-sm mt-1">Kelas XII RPL 1 • NIS: 2024001234</p>
  </div>

  {{-- ====== Statistik Atas ====== --}}
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
    <!-- Kehadiran -->
    <div class="bg-white rounded-xl shadow-md p-4 sm:p-5 relative">
      <div class="absolute top-3 right-3 sm:top-4 sm:right-4 bg-green-100 p-2 rounded-lg">
        <i data-lucide="check-circle" class="w-5 h-5 sm:w-6 sm:h-6 text-green-600"></i>
      </div>
      <h3 class="text-gray-700 font-semibold text-sm sm:text-base">Kehadiran</h3>
      <p class="text-2xl sm:text-3xl font-bold mt-2">90%</p>
    </div>

    <!-- Rata-rata Nilai -->
    <div class="bg-white rounded-xl shadow-md p-4 sm:p-5 relative">
      <div class="absolute top-3 right-3 sm:top-4 sm:right-4 bg-yellow-100 p-2 rounded-lg">
        <i data-lucide="trophy" class="w-5 h-5 sm:w-6 sm:h-6 text-yellow-600"></i>
      </div>
      <h3 class="text-gray-700 font-semibold text-sm sm:text-base">Rata-Rata Nilai</h3>
      <p class="text-2xl sm:text-3xl font-bold mt-2">88,9</p>
    </div>

    <!-- Mata Pelajaran -->
    <div class="bg-white rounded-xl shadow-md p-4 sm:p-5 relative">
      <div class="absolute top-3 right-3 sm:top-4 sm:right-4 bg-orange-100 p-2 rounded-lg">
        <i data-lucide="book-open" class="w-5 h-5 sm:w-6 sm:h-6 text-orange-600"></i>
      </div>
      <h3 class="text-gray-700 font-semibold text-sm sm:text-base">Mata Pelajaran</h3>
      <p class="text-2xl sm:text-3xl font-bold mt-2">14</p>
    </div>

    <!-- Pesan -->
    <div class="bg-white rounded-xl shadow-md p-4 sm:p-5 relative">
      <div class="absolute top-3 right-3 sm:top-4 sm:right-4 bg-blue-100 p-2 rounded-lg">
        <i data-lucide="message-square" class="w-5 h-5 sm:w-6 sm:h-6 text-blue-600"></i>
      </div>
      <h3 class="text-gray-700 font-semibold text-sm sm:text-base">Pesan</h3>
      <p class="text-2xl sm:text-3xl font-bold mt-2">3</p>
    </div>
  </div>

  {{-- ====== Bagian Tengah ====== --}}
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
    <div class="bg-white rounded-xl shadow-md p-4 sm:p-5">
      <h3 class="font-semibold text-gray-700 mb-2 text-sm sm:text-base">Jadwal Pelajaran</h3>
      <a href="#" class="text-xs sm:text-sm text-blue-600 hover:underline">Lihat Jadwal Harian</a>
    </div>
    <div class="bg-white rounded-xl shadow-md p-4 sm:p-5">
      <h3 class="font-semibold text-gray-700 mb-2 text-sm sm:text-base">Absensi</h3>
      <a href="#" class="text-xs sm:text-sm text-blue-600 hover:underline">Cek Kehadiran</a>
    </div>
    <div class="bg-white rounded-xl shadow-md p-4 sm:p-5">
      <h3 class="font-semibold text-gray-700 mb-2 text-sm sm:text-base">Nilai dan Rapor</h3>
      <a href="#" class="text-xs sm:text-sm text-blue-600 hover:underline">Lihat Nilai</a>
    </div>
  </div>

  {{-- ====== Bagian Bawah ====== --}}
  <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
    <div class="bg-white rounded-xl shadow-md p-4 sm:p-5">
      <h3 class="font-semibold text-gray-700 mb-2 text-sm sm:text-base">PKL</h3>
      <a href="#" class="text-xs sm:text-sm text-blue-600 hover:underline">Lihat Perkembangan PKL</a>
    </div>
    <div class="bg-white rounded-xl shadow-md p-4 sm:p-5 relative">
      <div class="absolute top-3 right-3 sm:top-4 sm:right-4 bg-indigo-100 p-2 rounded-lg">
        <i data-lucide="bell" class="w-5 h-5 sm:w-6 sm:h-6 text-indigo-600"></i>
      </div>
      <h3 class="font-semibold text-gray-700 mb-2 text-sm sm:text-base">Pengumuman</h3>
      <a href="#" class="text-xs sm:text-sm text-blue-600 hover:underline">Info Terbaru</a>
    </div>
  </div>

  {{-- ====== Aktivitas Terbaru ====== --}}
  <div>
    <h2 class="text-base sm:text-lg font-semibold text-blue-700 mb-4">Aktivitas Terbaru</h2>
    <div class="space-y-2">
      <div class="flex items-center gap-2 bg-orange-50 p-3 rounded-lg text-xs sm:text-sm">
        <span class="w-2 h-2 sm:w-3 sm:h-3 bg-orange-500 rounded-full"></span>
        <p class="text-gray-700">Tugas Matematika telah dinilai - Nilai: 88</p>
      </div>
      <div class="flex items-center gap-2 bg-blue-50 p-3 rounded-lg text-xs sm:text-sm">
        <span class="w-2 h-2 sm:w-3 sm:h-3 bg-blue-500 rounded-full"></span>
        <p class="text-gray-700">Tugas Pai telah dinilai - Nilai: 98</p>
      </div>
    </div>
  </div>

</div>
@endsection