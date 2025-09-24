@extends('siakad.index')

@section('content')
<div class="p-6 space-y-8">

{{-- Banner Sambutan --}}
<div class="bg-gradient-to-r from-orange-500 to-yellow-400 rounded-xl shadow-md p-6 mb-8 text-white">
  <h2 class="text-xl font-bold">Selamat Datang, Ahmad Rizki!</h2>
  <p class="text-sm mt-1">Kelas XII RPL 1 • NIS: 2024001234</p>
</div>

  {{-- ====== Statistik Atas ====== --}}
  <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    <!-- Kehadiran -->
    <div class="bg-white rounded-xl shadow-md p-5 relative">
      <div class="absolute top-4 right-4 bg-green-100 p-2 rounded-lg">
        <i data-lucide="check-circle" class="w-6 h-6 text-green-600"></i>
      </div>
      <h3 class="text-gray-700 font-semibold">Kehadiran</h3>
      <p class="text-3xl font-bold mt-2">90%</p>
    </div>

    <!-- Rata-rata Nilai -->
    <div class="bg-white rounded-xl shadow-md p-5 relative">
      <div class="absolute top-4 right-4 bg-yellow-100 p-2 rounded-lg">
        <i data-lucide="trophy" class="w-6 h-6 text-yellow-600"></i>
      </div>
      <h3 class="text-gray-700 font-semibold">Rata-Rata Nilai</h3>
      <p class="text-3xl font-bold mt-2">88,9</p>
    </div>

    <!-- Mata Pelajaran -->
    <div class="bg-white rounded-xl shadow-md p-5 relative">
      <div class="absolute top-4 right-4 bg-orange-100 p-2 rounded-lg">
        <i data-lucide="book-open" class="w-6 h-6 text-orange-600"></i>
      </div>
      <h3 class="text-gray-700 font-semibold">Mata Pelajaran</h3>
      <p class="text-3xl font-bold mt-2">14</p>
    </div>

    <!-- Pesan -->
    <div class="bg-white rounded-xl shadow-md p-5 relative">
      <div class="absolute top-4 right-4 bg-blue-100 p-2 rounded-lg">
        <i data-lucide="message-square" class="w-6 h-6 text-blue-600"></i>
      </div>
      <h3 class="text-gray-700 font-semibold">Pesan</h3>
      <p class="text-3xl font-bold mt-2">3</p>
    </div>
  </div>

  {{-- ====== Bagian Tengah ====== --}}
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white rounded-xl shadow-md p-5">
      <h3 class="font-semibold text-gray-700 mb-2">Jadwal Pelajaran</h3>
      <a href="#" class="text-sm text-blue-600 hover:underline">Lihat Jadwal Harian</a>
    </div>
    <div class="bg-white rounded-xl shadow-md p-5">
      <h3 class="font-semibold text-gray-700 mb-2">Absensi</h3>
      <a href="#" class="text-sm text-blue-600 hover:underline">Cek Kehadiran</a>
    </div>
    <div class="bg-white rounded-xl shadow-md p-5">
      <h3 class="font-semibold text-gray-700 mb-2">Nilai Dan Rapor</h3>
      <a href="#" class="text-sm text-blue-600 hover:underline">Cek Kehadiran</a>
    </div>
  </div>

  {{-- ====== Bagian Bawah ====== --}}
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white rounded-xl shadow-md p-5">
      <h3 class="font-semibold text-gray-700 mb-2">PKL</h3>
      <a href="#" class="text-sm text-blue-600 hover:underline">Lihat Perkembangan PKL</a>
    </div>
    <div class="bg-white rounded-xl shadow-md p-5 relative">
      <div class="absolute top-4 right-4 bg-indigo-100 p-2 rounded-lg">
        <i data-lucide="bell" class="w-6 h-6 text-indigo-600"></i>
      </div>
      <h3 class="font-semibold text-gray-700 mb-2">Pengumuman</h3>
      <a href="#" class="text-sm text-blue-600 hover:underline">Info Terbaru</a>
    </div>
  </div>

  {{-- ====== Aktivitas Terbaru ====== --}}
  <div>
    <h2 class="text-lg font-semibold text-blue-700 mb-4">Aktivitas Terbaru</h2>
    <div class="space-y-2">
      <div class="flex items-center gap-2 bg-orange-50 p-3 rounded-lg">
        <span class="w-3 h-3 bg-orange-500 rounded-full"></span>
        <p class="text-gray-700 text-sm">Tugas Matematika telah dinilai - Nilai: 88</p>
      </div>
      <div class="flex items-center gap-2 bg-blue-50 p-3 rounded-lg">
        <span class="w-3 h-3 bg-blue-500 rounded-full"></span>
        <p class="text-gray-700 text-sm">Tugas Pai telah dinilai - Nilai: 98</p>
      </div>
    </div>
  </div>

</div>
@endsection
